import React from 'react'
import Select2 from '@/Components/Select2'
import ProtectedComponent from '@/Components/ProtectedComponent'

const WhoCanDownload = ({
    setData,
    formData,
    translate,
    errors,
    users,
    normalAudit,
}) => {
    const returnBody = () => {
        return (
            <Select2
                size={'lg'}
                data={users}
                placeholder={translate('Write user name')}
                isMulti={true}
                selectAllOption={true}
                variant={'outlined'}
                selectedImage={'image'}
                error={errors.who_can_download}
                onChange={value => {
                    setData('who_can_download', value)
                }}
                value={formData.who_can_download}
                selectLabel={'name'}
                label={translate('Who can download')}
                selectValue={'id'}
            />
        )
    }
    return (
        <div className={'mt-3'}>
            {normalAudit ? (
                <ProtectedComponent role={'edit-report-edit-download-access'}>
                    {returnBody()}
                </ProtectedComponent>
            ) : (
                returnBody()
            )}
        </div>
    )
}

export default WhoCanDownload
