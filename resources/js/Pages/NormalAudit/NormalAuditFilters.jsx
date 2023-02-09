import React from 'react'
import {
    Button,
    Dialog,
    DialogActions,
    DialogContent,
    DialogContentText,
    DialogTitle,
    FormControlLabel,
    Switch,
    TextField,
} from '@mui/material'
import { LoadingButton } from '@mui/lab'
import SaveIcon from '@mui/icons-material/Save'
import CloseIcon from '@mui/icons-material/Close'
import { useForm, usePage } from '@inertiajs/inertia-react'
import MuiSelect from '@/Components/MUISelect'
import Datepicker from '@/Components/Datepicker'
import Select2 from '@/Components/Select2'
import { Inertia } from '@inertiajs/inertia'

const NormalAuditFilters = ({
    translate,
    onClose,
    item,
    reported_by,
    filters,
}) => {
    const { lang } = usePage().props
    const [processing, setProcessing] = React.useState(false)

    const handleClose = () => {
        onClose()
    }

    const { setData, data } = useForm({
        date_field: filters.date_field,
        start_date: filters.start_date,
        end_date: filters.end_date,
        status: filters.status,
        reported_by: filters.reported_by,
        show_trashed: filters.show_trashed === '1',
    })

    const handleSubmit = event => {
        event.preventDefault()
        setProcessing(true)
        Inertia.get(
            route(route().current(), {
                lang,
                date_field: data.date_field,
                start_date: data.start_date,
                end_date: data.end_date,
                status: data.status,
                reported_by: data.reported_by,
                show_trashed: data.show_trashed,
            }),
            {},
            {
                onSuccess: () => {
                    setProcessing(false)
                },
            },
        )
        /*get(route('normal-audit.index', { lang }), {
            onSuccess: () => {
                handleClose()
            },
        })*/
        /*if (!item) {
            get(route('normal-audit.index', { lang }), {
                onSuccess: () => {
                    handleClose()
                },
            })
        } else {
            put(route('route.update', { lang, item: item.id }), {
                onSuccess: () => {
                    handleClose()
                },
            })
        }*/
    }

    return (
        <Dialog open={true} fullWidth={true} maxWidth={'sm'}>
            <DialogTitle>{translate('Normal Audit Filters')}</DialogTitle>
            <form onSubmit={handleSubmit}>
                <DialogContent>
                    <DialogContentText>
                        <p>{translate('Filter by date')}</p>
                        <div className={'pl-5 mt-3 border-l border-gray-500'}>
                            <MuiSelect
                                fullWidth={true}
                                value={data.date_field}
                                onChange={value => {
                                    if (value.value === null) {
                                        setData('date_field', null)
                                    } else {
                                        setData(
                                            'date_field',
                                            value.target.value,
                                        )
                                    }
                                }}
                                options={[
                                    {
                                        label: translate('Reported on'),
                                        value: 'created_at',
                                    },
                                    {
                                        label: translate('Audit start date'),
                                        value: 'audit_start_date',
                                    },
                                    {
                                        label: translate('Audit end date'),
                                        value: 'audit_end_date',
                                    },
                                ]}
                                label={translate('Date field')}
                            />
                            {data.date_field !== null && (
                                <div className={'mt-4 grid grid-cols-2 gap-2'}>
                                    <Datepicker
                                        fullWidth={true}
                                        value={data.start_date}
                                        label={translate('Start date')}
                                        onChange={date =>
                                            setData('start_date', date)
                                        }
                                    />
                                    <Datepicker
                                        fullWidth={true}
                                        value={data.end_date}
                                        label={translate('End date')}
                                        onChange={date =>
                                            setData('end_date', date)
                                        }
                                    />
                                </div>
                            )}
                        </div>
                        <p className={'py-3'}>
                            {translate('Filter by status')}
                        </p>
                        <div className={'pl-5 border-l border-gray-500'}>
                            <Select2
                                selectLabel={'label'}
                                selectValue={'id'}
                                value={data.status}
                                label={translate('Status')}
                                onChange={data => {
                                    let formatted = data?.map(item => {
                                        return {
                                            label: item.label,
                                            value: item.value,
                                        }
                                    })
                                    setData('status', formatted)
                                }}
                                isMulti={true}
                                placeholder={translate('Write status')}
                                data={[
                                    {
                                        label: translate('New'),
                                        id: 1,
                                    },
                                    {
                                        label: translate('Approved'),
                                        id: 2,
                                    },
                                    {
                                        label: translate('Reviewed'),
                                        id: 3,
                                    },
                                ]}
                            />
                        </div>
                        <p className={'py-3'}>{translate('Reported by')}</p>
                        <div className={'pl-5 border-l border-gray-500'}>
                            <Select2
                                selectLabel={'name'}
                                selectValue={'id'}
                                value={data.reported_by}
                                label={translate('User')}
                                onChange={data => {
                                    let formatted = data?.map(item => {
                                        return {
                                            label: item.label,
                                            value: item.value,
                                        }
                                    })
                                    setData('reported_by', formatted)
                                }}
                                isMulti={true}
                                placeholder={translate('Write user name')}
                                data={reported_by}
                            />
                        </div>
                        <FormControlLabel
                            control={
                                <Switch
                                    onChange={event =>
                                        setData(
                                            'show_trashed',
                                            event.target.checked,
                                        )
                                    }
                                    checked={data.show_trashed}
                                />
                            }
                            label={translate('Show trashed reports')}
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

export default NormalAuditFilters
