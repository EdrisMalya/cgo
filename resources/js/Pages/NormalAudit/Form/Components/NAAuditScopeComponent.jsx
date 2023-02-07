import React from 'react'
import Datepicker from '@/Components/Datepicker'
import { TextField } from '@mui/material'

const NaAuditScopeComponent = ({
    translate,
    dispatch,
    formData,
    setData,
    errors,
}) => {
    return (
        <div className={'grid grid-cols-3 mt-4 gap-2'}>
            <TextField
                label={translate('Fiscal year')}
                type={'number'}
                size={'small'}
                onChange={event => {
                    setData('fiscal_year', event.target.value)
                }}
                value={formData.fiscal_year}
                error={errors.fiscal_year}
                helperText={errors.fiscal_year}
            />
            <Datepicker
                value={formData.audit_start_date}
                format={'YYYY-MM-DD'}
                onChange={date => {
                    setData('audit_start_date', date)
                }}
                error={errors.audit_start_date}
                helperText={errors.audit_start_date}
                label={translate('Audit start date')}
            />
            <Datepicker
                value={formData.audit_end_date}
                format={'YYYY-MM-DD'}
                onChange={date => {
                    setData('audit_end_date', date)
                }}
                error={errors.audit_end_date}
                helperText={errors.audit_end_date}
                label={translate('Audit end date')}
            />
        </div>
    )
}

export default NaAuditScopeComponent
