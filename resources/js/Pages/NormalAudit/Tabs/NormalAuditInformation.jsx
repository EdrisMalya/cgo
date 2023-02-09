import React from 'react'
import AuditDocumentFiles from '@/Components/AuditForms/AuditDocumentFiles'
import { Button, Fab, TextField } from '@mui/material'
import dayjs from 'dayjs'
import AuditDocumentMembers from '@/Components/AuditForms/AuditDocumentMembers'
import parse from 'html-react-parser'
import { PencilIcon } from '@heroicons/react/24/outline'
import { TrashIcon } from '@heroicons/react/24/solid'
import ProtectedComponent from '@/Components/ProtectedComponent'
import { Link, useForm } from '@inertiajs/inertia-react'
import swal from 'sweetalert'
import { useRecoilState } from 'recoil'
import { fullPageLoading } from '@/atoms/fullPageLoading'

const NormalAuditInformation = ({ translate, normal_audit, lang }) => {
    const loading = useRecoilState(fullPageLoading)
    const { delete: destroy } = useForm()
    const handleDelete = action => {
        swal({
            icon: 'warning',
            title: translate('Are you sure?'),
            buttons: true,
        }).then(res => {
            if (res) {
                loading[1](true)
                destroy(
                    route('normal-audit.destroy', {
                        normal_audit: normal_audit.id,
                        lang,
                        type: 'delete-normal-audit',
                        action,
                    }),
                    {
                        onSuccess: () => {
                            loading[1](false)
                        },
                    },
                )
            }
        })
    }
    return (
        <div>
            <div className={'flex items-center justify-between'}>
                <h2 className={'text-xl'}>
                    {translate('Normal audit details')}
                </h2>
                <div className={'flex items-center space-x-2'}>
                    <ProtectedComponent role={'edit-report-access'}>
                        <Link
                            href={route('normal-audit.edit', {
                                normal_audit: normal_audit.id,
                                lang,
                            })}>
                            <Fab color={'warning'} size={'small'}>
                                <PencilIcon className={'h-4'} />
                            </Fab>
                        </Link>
                    </ProtectedComponent>
                    <ProtectedComponent role={'normal-audit-delete-report'}>
                        <Fab
                            onClick={() => handleDelete('move-to-trash')}
                            color={'error'}
                            size={'small'}>
                            <TrashIcon className={'h-4'} />
                        </Fab>
                    </ProtectedComponent>
                    {normal_audit.is_trashed ? (
                        <ProtectedComponent
                            role={'normal-audit-remove-from-trash'}>
                            <Button
                                onClick={() =>
                                    handleDelete('remove-from-trash')
                                }
                                variant={'outlined'}
                                color={'success'}>
                                {translate('Remove from trash')}
                            </Button>
                        </ProtectedComponent>
                    ) : (
                        <></>
                    )}
                </div>
            </div>
            <div className="mt-4 pl-4 border-l dark:border-gray-700">
                <p>{translate('Audit files')}</p>
                <AuditDocumentFiles
                    files={normal_audit.files}
                    type="na"
                    translate={translate}
                    lang={lang}
                />
            </div>
            <div className="grid grid-cols-6 mt-3 gap-2">
                <TextField
                    size={'small'}
                    label={translate('Audited by')}
                    disabled
                    value={normal_audit.reported_by.name}
                />
                <TextField
                    size={'small'}
                    label={translate('Audited start date')}
                    disabled
                    value={normal_audit.audit_start_date}
                />
                <TextField
                    size={'small'}
                    label={translate('Audited end date')}
                    disabled
                    value={normal_audit.audit_end_date}
                />
                <TextField
                    size={'small'}
                    label={translate('Status')}
                    disabled
                    value={normal_audit.status}
                />
                <TextField
                    size={'small'}
                    label={translate('Reported on')}
                    disabled
                    value={dayjs(normal_audit.reported_on).format(
                        'YYYY/MMM/DD hh:mm A',
                    )}
                />
                <TextField
                    size={'small'}
                    label={translate('Confidentiality level')}
                    disabled
                    value={normal_audit.confidentiality_level.name}
                />
                <TextField
                    size={'small'}
                    label={translate('File version')}
                    disabled
                    value={normal_audit.file_version}
                />
                <TextField
                    size={'small'}
                    label={translate('File location')}
                    disabled
                    value={normal_audit.file_location}
                />
                <TextField
                    size={'small'}
                    label={translate('Total pages')}
                    disabled
                    value={normal_audit.total_pages}
                />
                <TextField
                    size={'small'}
                    label={translate('Fiscal year')}
                    disabled
                    value={normal_audit.fiscal_year}
                />
            </div>
            <div>
                <AuditDocumentMembers
                    translate={translate}
                    members={normal_audit.members}
                />
                <h3 className="mt-3">
                    {translate('Is report sent to governor office?')}
                    <span
                        className={`px-2 ml-2 rounded-full ${
                            normal_audit.is_sent_to_governor
                                ? 'bg-green-500'
                                : 'bg-red-500'
                        }`}>
                        {normal_audit.is_sent_to_governor
                            ? translate('Yes')
                            : translate('No')}
                    </span>
                </h3>
                <div className="border dark:border-gray-600 p-3 rounded-lg mt-2">
                    <h4>{translate('Governor office remarks')}</h4>
                    <div className="prose p-2">
                        {parse(normal_audit.governor_office_remarks)}
                    </div>
                </div>
            </div>
            <div className="grid grid-cols-6 mt-3 gap-2">
                <TextField
                    size={'small'}
                    label={translate('Governor sent date')}
                    disabled
                    value={normal_audit.sent_to_governor_date}
                />
                <TextField
                    size={'small'}
                    label={translate('File manual sequence number')}
                    disabled
                    value={normal_audit.file_manual_sequence_number}
                />
            </div>
        </div>
    )
}

export default NormalAuditInformation
