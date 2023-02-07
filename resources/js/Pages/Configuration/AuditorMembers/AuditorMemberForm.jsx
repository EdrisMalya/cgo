import React, { useEffect, useRef, useState } from 'react'
import {
    Button,
    Dialog,
    DialogActions,
    DialogContent,
    DialogContentText,
    DialogTitle,
    TextField,
    Tooltip,
} from '@mui/material'
import { LoadingButton } from '@mui/lab'
import SaveIcon from '@mui/icons-material/Save'
import CloseIcon from '@mui/icons-material/Close'
import { useForm, usePage } from '@inertiajs/inertia-react'
import MUISelect from '@/Components/MUISelect'

const AuditorMemberForm = ({ translate, onClose, member }) => {
    const [selectedImage, setSelectedImage] = useState(null)
    const inputRef = useRef()

    const { lang } = usePage().props

    const handleClose = () => {
        onClose()
    }

    const { post, processing, setData, data, errors, put } = useForm({
        first_name: member?.first_name,
        last_name: member?.last_name,
        email: member?.email,
        phone_number: member?.phone_number,
        image: member?.image,
        status: member ? member.status : true,
    })

    const handleChange = event => {
        setData(event.target.name, event.target.value)
    }

    const handleSubmit = event => {
        event.preventDefault()
        if (!member) {
            post(route('auditor-members.store', { lang }), {
                onSuccess: () => {
                    handleClose()
                },
            })
        } else {
            put(
                route('auditor-members.update', {
                    lang,
                    auditor_member: member.id,
                }),
                {
                    onSuccess: () => {
                        handleClose()
                    },
                },
            )
        }
    }

    const imageAdded = e => {
        const reader = new FileReader()
        if (e.target.files[0]) {
            reader.readAsDataURL(e.target.files[0])
        }
        reader.onload = readerEvent => {
            setSelectedImage(readerEvent.target.result)
        }
        setData('image', e.target.files[0])
    }

    useEffect(() => {
        if (member) {
            setSelectedImage(route().t.url + '/storage/' + member.image)
        }
    }, [])

    return (
        <Dialog open={true} fullWidth={true} maxWidth={'sm'}>
            <DialogTitle>{translate('Widget component form')}</DialogTitle>
            <form onSubmit={handleSubmit}>
                <DialogContent>
                    <DialogContentText>
                        <Tooltip title={translate('Profile picture')}>
                            <div
                                onClick={() => inputRef.current.click()}
                                className={`w-[100px] h-[100px] mx-auto rounded-full border dark:border-gray-800 cursor-pointer overflow-hidden ${
                                    errors.image && 'border-3 !border-red-500'
                                }`}>
                                {selectedImage && (
                                    <>
                                        <div className={'relative'}>
                                            <img
                                                src={selectedImage}
                                                className={'w-full'}
                                            />
                                        </div>
                                    </>
                                )}
                            </div>
                        </Tooltip>
                        <div className={'grid grid-cols-2 gap-3 mt-4'}>
                            <TextField
                                onChange={handleChange}
                                value={data.first_name}
                                error={errors.first_name}
                                helperText={errors.first_name}
                                name={'first_name'}
                                size={'small'}
                                label={translate('First name')}
                            />
                            <TextField
                                onChange={handleChange}
                                value={data.last_name}
                                error={errors.last_name}
                                helperText={errors.last_name}
                                name={'last_name'}
                                size={'small'}
                                label={translate('Last name')}
                            />
                            <TextField
                                onChange={handleChange}
                                value={data.email}
                                error={errors.email}
                                helperText={errors.email}
                                name={'email'}
                                size={'small'}
                                label={translate('Email')}
                            />
                            <TextField
                                onChange={handleChange}
                                value={data.phone_number}
                                error={errors.phone_number}
                                helperText={errors.phone_number}
                                name={'phone_number'}
                                size={'small'}
                                label={translate('Phone Number')}
                            />
                            {member && (
                                <MUISelect
                                    className={'col-span-2'}
                                    value={member.status}
                                    name={'status'}
                                    label={translate('Status')}
                                    options={[
                                        {
                                            label: translate('Active'),
                                            value: true,
                                        },
                                        {
                                            label: translate('Inactive'),
                                            value: false,
                                        },
                                    ]}
                                    onChange={event => {
                                        setData(
                                            event.target.name,
                                            event.target.value,
                                        )
                                    }}
                                />
                            )}
                        </div>
                        <input
                            ref={inputRef}
                            accept={'image/*'}
                            onChange={imageAdded}
                            type={'file'}
                            className={'hidden'}
                        />
                    </DialogContentText>
                </DialogContent>
                <DialogActions>
                    <LoadingButton
                        color={'success'}
                        type={'submit'}
                        variant={'outlined'}
                        loading={processing}
                        endIcon={<SaveIcon />}>
                        {translate('Save')}
                    </LoadingButton>
                    <Button
                        type={'button'}
                        endIcon={<CloseIcon />}
                        color={'error'}
                        onClick={handleClose}
                        variant={'outlined'}>
                        {translate('Close')}
                    </Button>
                </DialogActions>
            </form>
        </Dialog>
    )
}

export default AuditorMemberForm
