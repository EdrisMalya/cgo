import React from 'react'
import { Chip, Fab } from '@mui/material'
import { PlusIcon } from '@heroicons/react/24/outline'
import AllowedExtensionsForm from '@/Pages/Configuration/ApplicationSettings/AllowedExtensions/AllowedExtensionsForm'
import { usePage } from '@inertiajs/inertia-react'
import swal from 'sweetalert'
import { useRecoilState } from 'recoil'
import { fullPageLoading } from '@/atoms/fullPageLoading'
import { Inertia } from '@inertiajs/inertia'

const AllowedExtensionsIndex = ({ translate }) => {
    const [show, setShow] = React.useState(false)
    const setLoading = useRecoilState(fullPageLoading)
    const { extensions, lang } = usePage().props

    const handleDelete = id => {
        swal({
            icon: 'warning',
            title: translate('Are you sure you want to delete?'),
            buttons: true,
        }).then(res => {
            if (res) {
                setLoading[1](true)
                Inertia.delete(
                    route('allowed-extensions.destroy', {
                        lang,
                        allowed_extension: id,
                    }),
                    {
                        onSuccess: () => {
                            setLoading[1](false)
                        },
                    },
                )
            }
        })
    }

    return (
        <div>
            <div>
                <h2 className={'text-center text-xl'}>
                    {translate('Allowed extensions list')}
                </h2>
                {extensions.length > 0 ? (
                    <div className={'py-8'}>
                        {extensions.map((ext, index) => (
                            <Chip
                                className={'!m-1'}
                                variant={'outlined'}
                                label={ext.name}
                                onDelete={() => handleDelete(ext.id)}
                                key={index}
                            />
                        ))}
                    </div>
                ) : (
                    <p className={'text-center my-8 text-red-500'}>
                        {translate('No record found')}
                    </p>
                )}

                <Fab
                    onClick={() => setShow(true)}
                    size={'small'}
                    color={'primary'}>
                    <PlusIcon className={'h-4'} />
                </Fab>
            </div>
            {show && (
                <AllowedExtensionsForm
                    translate={translate}
                    onClose={() => {
                        setShow(false)
                    }}
                />
            )}
        </div>
    )
}

export default AllowedExtensionsIndex
