import React from 'react'
import { FormControlLabel, Switch, TextField } from '@mui/material'
import Datepicker from '@/Components/Datepicker'
import Select2 from '@/Components/Select2'
import Editor from '@/Components/Editor'

const NaGovernorComponent = ({
    formData,
    translate,
    setData,
    errors,
    confidentiality_level,
    normalAudit,
}) => {
    const [remarks, setRemarks] = React.useState(null)
    const [didMount, setDidMount] = React.useState(false)
    const [sentTo, setSentTo] = React.useState(false)

    React.useEffect(() => {
        if (normalAudit) {
            setData('governor_office_remarks', {
                label: normalAudit.data.confidentiality_level.name,
                value: normalAudit.data.confidentiality_level.id,
            })
            if (normalAudit.data.governor_office_remarks) {
                setRemarks(normalAudit.data.governor_office_remarks)
            }
            setDidMount(true)
            setSentTo(normalAudit.data.is_sent_to_governor)
        }
    }, [normalAudit])

    React.useEffect(() => {
        if (!normalAudit) {
            setDidMount(true)
        }
    }, [])

    return didMount ? (
        <div className={'flex flex-col'}>
            <div className={'mt-3 grid grid-cols-3 gap-3'}>
                <Datepicker
                    value={formData.sent_to_governor_date}
                    format={'YYYY-MM-DD'}
                    onChange={value => {
                        setData('sent_to_governor_date', value)
                    }}
                    label={translate('Governor office sent date')}
                />
                <TextField
                    label={translate('Total pages')}
                    type={'number'}
                    size={'small'}
                    onChange={event => {
                        setData('total_pages', event.target.value)
                    }}
                    value={formData.total_pages}
                    error={errors.total_pages}
                    helperText={errors.total_pages}
                />
                <Select2
                    data={confidentiality_level}
                    value={formData.confidentiality_level}
                    error={errors.confidentiality_level}
                    onChange={value => {
                        setData('confidentiality_level', value)
                    }}
                    selectValue={'id'}
                    selectLabel={'name'}
                    label={'Confidentiality Level'}
                />
            </div>
            <div className={'mt-4'}>
                <p>{translate('Governor offices remarks')}</p>
                <Editor
                    data={remarks}
                    onChange={data => {
                        setData('governor_office_remarks', data)
                        setRemarks(data)
                    }}
                />
            </div>
            <FormControlLabel
                control={
                    <Switch
                        checked={sentTo}
                        onChange={e => {
                            setData('sent_to_governor', e.target.checked)
                            setSentTo(e.target.checked)
                        }}
                    />
                }
                label={translate('Is report sent to Governor Office?')}
            />
        </div>
    ) : (
        <></>
    )
}

export default NaGovernorComponent
