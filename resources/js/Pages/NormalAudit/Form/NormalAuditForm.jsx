import React, { useEffect, useReducer, useRef, useState } from 'react'
import Authenticated from '@/Layouts/AuthenticatedLayout'
import useLanguage from '@/hooks/useLanguage'
import NormalAuditLinks from '@/Pages/NormalAudit/NormalAuditLinks'
import { CGOReducer } from '@/Pages/CGOReducer/CGOReducer'
import { CGO_REDUCER_INITIAL_VALUE } from '@/Pages/CGOReducer/CGOReducerInertialValues'
import { useForm } from '@inertiajs/inertia-react'
import NASelectFilesComponent from '@/Pages/NormalAudit/Form/Components/NASelectFilesComponent'
import NAAuditedByComponent from '@/Pages/NormalAudit/Form/Components/NAAuditedByComponent'
import NAAuditScopeComponent from '@/Pages/NormalAudit/Form/Components/NAAuditScopeComponent'
import NAGovernorComponent from '@/Pages/NormalAudit/Form/Components/NAGovernorComponent'
import Select2 from '@/Components/Select2'
import NAReportInformationComponent from '@/Pages/NormalAudit/Form/Components/NAReportInformationComponent'
import WhoCanAccessComponent from '@/Pages/NormalAudit/Form/Components/WhoCanAccessComponent'
import WhoCanDownload from '@/Pages/NormalAudit/Form/Components/WhoCanDownload'
import { LoadingButton } from '@mui/lab'
import ProtectedComponent from '@/Components/ProtectedComponent'

const NormalAuditForm = ({
    active,
    lang,
    teams,
    confidentiality_level,
    roles,
    users,
    normal_audit,
    file_extensions,
}) => {
    const { translate } = useLanguage()

    const [data, dispatch] = useReducer(CGOReducer, CGO_REDUCER_INITIAL_VALUE)

    const {
        data: formData,
        setData,
        post,
        errors,
        processing,
    } = useForm({
        files: data.files,
        auditor_team_id: null,
        members: normal_audit
            ? normal_audit.data.members.map(member => {
                  return {
                      id: member.id,
                      name: member.name,
                  }
              })
            : [],
        fiscal_year: normal_audit?.data?.fiscal_year,
        audit_start_date: normal_audit?.data?.audit_start_date,
        audit_end_date: normal_audit?.data?.audit_end_date,
        sent_to_governor_date: normal_audit
            ? normal_audit?.data?.sent_to_governor_date
            : false,
        total_pages: normal_audit?.data?.total_pages,
        confidentiality_level: normal_audit
            ? {
                  label: normal_audit.data.confidentiality_level.name,
                  value: normal_audit.data.confidentiality_level.id,
              }
            : null,
        governor_office_remarks: normal_audit?.data?.governor_office_remarks,
        sent_to_governor: normal_audit
            ? normal_audit?.data?.is_sent_to_governor
            : false,
        file_location: normal_audit?.data?.file_location,
        file_version: normal_audit?.data?.file_version,
        file_manual_sequence_number:
            normal_audit?.data?.file_manual_sequence_number,
        role_id: normal_audit
            ? {
                  label: normal_audit.data.role.name,
                  value: normal_audit.data.role.id,
              }
            : null,
        authorize_users: [],
        who_can_download: normal_audit
            ? normal_audit.data.who_can_download?.map(user => {
                  return {
                      label: user.name,
                      value: user.id,
                      image: user.image,
                  }
              })
            : [],
    })

    const handleSubmit = event => {
        event.preventDefault()
        if (normal_audit) {
            post(
                route('normal-audit.update', {
                    lang,
                    _method: 'PUT',
                    normal_audit: normal_audit.data.id,
                }),
            )
        } else {
            post(route('normal-audit.store', { lang }))
        }
    }

    return (
        <Authenticated
            active={'normal_audit'}
            title={translate('Normal audit form')}
            navBarOptions={
                <NormalAuditLinks
                    active={active}
                    lang={lang}
                    translate={translate}
                />
            }>
            <div className={'p-6 max-w-4xl mx-auto shadow-2xl'}>
                <h2 className={'text-xl text-center'}>
                    {translate('Normal audit form')}
                </h2>
                <form onSubmit={handleSubmit}>
                    {normal_audit ? (
                        <ProtectedComponent role={'edit-report-edit-files'}>
                            <NASelectFilesComponent
                                dispatch={dispatch}
                                data={data}
                                setData={setData}
                                translate={translate}
                                normalAuditForm={normal_audit}
                                file_extensions={file_extensions}
                            />
                        </ProtectedComponent>
                    ) : (
                        <NASelectFilesComponent
                            dispatch={dispatch}
                            data={data}
                            setData={setData}
                            translate={translate}
                            lang={lang}
                            normalAuditForm={normal_audit}
                            file_extensions={file_extensions}
                        />
                    )}
                    <div>
                        <NAAuditedByComponent
                            dispatch={dispatch}
                            data={data}
                            setData={setData}
                            translate={translate}
                            teams={teams}
                            normalAuditForm={normal_audit}
                        />
                        {data.auditor_members.length > 0 && (
                            <div>
                                <NAAuditScopeComponent
                                    dispatch={dispatch}
                                    formData={formData}
                                    setData={setData}
                                    errors={errors}
                                    data={data}
                                    translate={translate}
                                />
                                {formData.fiscal_year &&
                                    formData.audit_start_date &&
                                    formData.audit_end_date && (
                                        <div>
                                            <NAGovernorComponent
                                                formData={formData}
                                                translate={translate}
                                                data={data}
                                                errors={errors}
                                                setData={setData}
                                                normalAudit={normal_audit}
                                                confidentiality_level={
                                                    confidentiality_level
                                                }
                                            />
                                            <NAReportInformationComponent
                                                formData={formData}
                                                translate={translate}
                                                data={data}
                                                errors={errors}
                                                setData={setData}
                                                normalAudit={normal_audit}
                                            />
                                            {formData.file_location &&
                                                formData.file_version &&
                                                formData.file_manual_sequence_number && (
                                                    <div>
                                                        <WhoCanAccessComponent
                                                            normalAudit={
                                                                normal_audit
                                                            }
                                                            formData={formData}
                                                            translate={
                                                                translate
                                                            }
                                                            data={data}
                                                            roles={roles}
                                                            errors={errors}
                                                            setData={setData}
                                                            dispatch={dispatch}
                                                        />
                                                        {data.authorize_users
                                                            .length > 0 && (
                                                            <div>
                                                                <WhoCanDownload
                                                                    normalAudit={
                                                                        normal_audit
                                                                    }
                                                                    users={
                                                                        users
                                                                    }
                                                                    formData={
                                                                        formData
                                                                    }
                                                                    translate={
                                                                        translate
                                                                    }
                                                                    data={data}
                                                                    roles={
                                                                        roles
                                                                    }
                                                                    errors={
                                                                        errors
                                                                    }
                                                                    setData={
                                                                        setData
                                                                    }
                                                                    dispatch={
                                                                        dispatch
                                                                    }
                                                                />
                                                                {formData
                                                                    .who_can_download
                                                                    .length >
                                                                    0 && (
                                                                    <div
                                                                        className={
                                                                            'mt-4 pb-12'
                                                                        }>
                                                                        <LoadingButton
                                                                            type={
                                                                                'submit'
                                                                            }
                                                                            loading={
                                                                                processing
                                                                            }
                                                                            fullWidth={
                                                                                true
                                                                            }
                                                                            size={
                                                                                'large'
                                                                            }
                                                                            variant={
                                                                                'outlined'
                                                                            }>
                                                                            {translate(
                                                                                'Save ',
                                                                            )}
                                                                        </LoadingButton>
                                                                    </div>
                                                                )}
                                                            </div>
                                                        )}
                                                    </div>
                                                )}
                                        </div>
                                    )}
                            </div>
                        )}
                    </div>
                </form>
            </div>
        </Authenticated>
    )
}

export default NormalAuditForm
