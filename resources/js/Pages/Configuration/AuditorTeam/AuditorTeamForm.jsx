import React from 'react'
import {
    Button,
    Dialog,
    DialogActions,
    DialogContent,
    DialogContentText,
    DialogTitle,
    TextField,
} from '@mui/material'
import { LoadingButton } from '@mui/lab'
import SaveIcon from '@mui/icons-material/Save'
import CloseIcon from '@mui/icons-material/Close'
import { useForm, usePage } from '@inertiajs/inertia-react'
import MUISelect from '@/Components/MUISelect'

const AuditorTeamForm = ({ translate, onClose, team }) => {
    const { lang } = usePage().props

    const handleClose = () => {
        onClose()
    }

    const { post, processing, setData, data, errors, put } = useForm({
        name: team?.name,
        status: team ? team.status : true,
    })

    const handleChange = event => {
        setData(event.target.name, event.target.value)
    }

    const handleSubmit = event => {
        event.preventDefault()
        if (!team) {
            post(route('auditor-team.store', { lang }), {
                onSuccess: () => {
                    handleClose()
                },
            })
        } else {
            put(route('auditor-team.update', { lang, auditor_team: team.id }), {
                onSuccess: () => {
                    handleClose()
                },
            })
        }
    }

    return (
        <Dialog open={true}>
            <DialogTitle>{translate('Auditor team form')}</DialogTitle>
            <form onSubmit={handleSubmit}>
                <DialogContent>
                    <DialogContentText className={'space-y-3'}>
                        <TextField
                            onChange={handleChange}
                            value={data.name}
                            error={errors.name}
                            helperText={errors.name}
                            name={'name'}
                            fullWidth={true}
                            size={'small'}
                            label={translate('Name')}
                        />
                        {team && (
                            <MUISelect
                                value={team.status}
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

export default AuditorTeamForm
