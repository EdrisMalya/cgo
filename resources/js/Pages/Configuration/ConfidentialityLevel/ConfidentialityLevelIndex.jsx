import React from 'react'
import Authenticated from '@/Layouts/AuthenticatedLayout'
import ConfigurationPageLinks from '@/Pages/Configuration/ConfigurationPageLinks'
import useLanguage from '@/hooks/useLanguage'
import { Button, IconButton } from '@mui/material'
import {
    ArrowLeftIcon,
    PencilIcon,
    PlusIcon,
} from '@heroicons/react/24/outline'
import ProtectedComponent from '@/Components/ProtectedComponent'
import ConfidentialityLevelForm from '@/Pages/Configuration/ConfidentialityLevel/ConfidentialityLevelForm'
import { TrashIcon } from '@heroicons/react/24/solid'
import swal from 'sweetalert'
import { useRecoilState } from 'recoil'
import { fullPageLoading } from '@/atoms/fullPageLoading'
import { useForm } from '@inertiajs/inertia-react'

const ConfidentialityLevelIndex = ({ active, lang, levels }) => {
    const { translate } = useLanguage()
    const [form, setForm] = React.useState(false)
    const [level, setLevel] = React.useState(false)
    const setLoading = useRecoilState(fullPageLoading)

    const { delete: deleteAction } = useForm()

    const handleDeleteAction = id => {
        swal({
            icon: 'warning',
            title: `Are you sure you want to delete?`,
            buttons: true,
        }).then(res => {
            if (res) {
                setLoading[1](true)
                deleteAction(
                    route('confidentiality-level.destroy', {
                        confidentiality_level: id,
                        lang,
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

    const handleEditAction = language => {
        setLevel(language)
        setForm(true)
    }

    return (
        <Authenticated
            active={'configuration'}
            title={translate('Confidentiality Level')}
            navBarOptions={
                <ConfigurationPageLinks active={active} lang={lang} />
            }>
            <div className={'flex items-center justify-between'}>
                <h1>{translate('Confidentiality Levels')}</h1>
                <ProtectedComponent role={'confidentiality-level-create'}>
                    <Button
                        onClick={() => {
                            setLevel(null)
                            setForm(true)
                        }}
                        variant={'outlined'}
                        endIcon={<PlusIcon className={'h-4'} />}
                        size={'small'}>
                        {translate('Add new')}
                    </Button>
                </ProtectedComponent>
            </div>
            <div className={'mt-8'}>
                {levels?.length < 1 ? (
                    <p className={'text-center text-red-500 py-12'}>
                        {translate('No record found')}
                    </p>
                ) : (
                    <div className={'mt-3 flex flex-row flex-wrap space-x-2'}>
                        {levels?.map(item => (
                            <div
                                className={
                                    'inline-block p-2 border dark:border-gray-600 text-sm rounded-full m-1'
                                }
                                key={item?.id}>
                                <div
                                    className={
                                        'flex items-center space-x-2 px-1'
                                    }>
                                    <div>{translate(item?.name)} </div>
                                    <div>
                                        <ProtectedComponent
                                            role={
                                                'confidentiality-level-delete'
                                            }>
                                            <IconButton
                                                size={'small'}
                                                color={'error'}
                                                onClick={() =>
                                                    handleDeleteAction(item?.id)
                                                }>
                                                <TrashIcon className={'h-3'} />
                                            </IconButton>
                                        </ProtectedComponent>
                                        <ProtectedComponent
                                            role={'confidentiality-level-edit'}>
                                            <IconButton
                                                size={'small'}
                                                color={'warning'}
                                                onClick={() =>
                                                    handleEditAction(item)
                                                }>
                                                <PencilIcon className={'h-3'} />
                                            </IconButton>
                                        </ProtectedComponent>
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>
                )}
            </div>
            {form && (
                <ConfidentialityLevelForm
                    translate={translate}
                    level={level}
                    onClose={() => {
                        setLevel(null)
                        setForm(false)
                    }}
                />
            )}
        </Authenticated>
    )
}

export default ConfidentialityLevelIndex
