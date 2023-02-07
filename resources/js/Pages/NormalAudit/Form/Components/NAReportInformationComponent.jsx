import React from 'react'
import { TextField } from '@mui/material'

const NaReportInformationComponent = ({
    setData,
    formData,
    data,
    translate,
    errors,
}) => {
    return (
        <div>
            <div className={'grid grid-cols-3 mt-4 gap-3'}>
                <TextField
                    label={translate('File Location')}
                    size={'small'}
                    onChange={event => {
                        setData('file_location', event.target.value)
                    }}
                    value={formData.file_location}
                    error={errors.file_location}
                />
                <TextField
                    label={translate('File version')}
                    size={'small'}
                    onChange={event => {
                        setData('file_version', event.target.value)
                    }}
                    value={formData.file_version}
                    error={errors.file_version}
                />
                <TextField
                    label={translate('File manual sequence number')}
                    size={'small'}
                    onChange={event => {
                        setData(
                            'file_manual_sequence_number',
                            event.target.value,
                        )
                    }}
                    value={formData.file_manual_sequence_number}
                    error={errors.file_manual_sequence_number}
                />
            </div>
        </div>
    )
}

export default NaReportInformationComponent
