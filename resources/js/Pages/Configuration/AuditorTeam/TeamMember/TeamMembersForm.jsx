import React, { useEffect } from 'react'
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
import Select2 from '@/Components/Select2'

const TeamMembersForm = ({
    translate,
    onClose,
    team,
    auditor_members,
    members = [],
}) => {
    const { lang } = usePage().props

    const handleClose = () => {
        onClose()
    }

    const { post, processing, setData, data, errors, put } = useForm({
        members: members,
        team: team,
    })

    const handleChange = event => {
        setData(event.target.name, event.target.value)
    }

    const handleSubmit = event => {
        event.preventDefault()
        post(
            route('auditor-team.store', {
                lang,
                save_type: 'save-auditor-members',
            }),
            {
                onSuccess: () => {
                    handleClose()
                },
            },
        )
    }

    useEffect(() => {
        if (team.members.length > 0) {
            let members = team.members.map(item => {
                return {
                    label: item.member.first_name + ' ' + item.member.last_name,
                    value: item.member.id,
                    image: item.member.image,
                }
            })
            setData('members', members)
        }
    }, [team])

    return (
        <Dialog open={true} maxWidth={'sm'} fullWidth={true}>
            <DialogTitle>{translate('Widget component form')}</DialogTitle>
            <form onSubmit={handleSubmit}>
                <DialogContent>
                    <DialogContentText>
                        <Select2
                            data={auditor_members}
                            isMulti={true}
                            label={translate('Auditor members')}
                            selectedImage={'image'}
                            selectValue={'id'}
                            value={data.members}
                            selectLabel={'first_name'}
                            onChange={members => {
                                setData('members', members)
                            }}
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

export default TeamMembersForm
