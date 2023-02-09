import React from 'react'
import Authenticated from '@/Layouts/AuthenticatedLayout'
import useLanguage from '@/hooks/useLanguage'
import { Button } from '@mui/material'
import { FunnelIcon, PlusIcon } from '@heroicons/react/24/outline'
import ProtectedComponent from '@/Components/ProtectedComponent'
import { Link } from '@inertiajs/inertia-react'
import NormalAuditLinks from '@/Pages/NormalAudit/NormalAuditLinks'
import Datatable from '@/Components/Datatable/Datatable'
import VisibilityIcon from '@mui/icons-material/Visibility'
import { Inertia } from '@inertiajs/inertia'
import NormalAuditFilters from '@/Pages/NormalAudit/NormalAuditFilters'

const NormalAuditIndex = ({
    lang,
    active,
    normal_audits,
    reported_by,
    filters,
}) => {
    const { translate } = useLanguage()
    const [showFilter, setShowFilter] = React.useState(false)
    return (
        <Authenticated
            title={translate('Normal audit home page')}
            active={'normal_audit'}
            navBarOptions={
                <NormalAuditLinks
                    translate={translate}
                    active={active}
                    lang={lang}
                />
            }>
            <div className={'flex items-center justify-between'}>
                <h2 className={'text-xl'}>{translate('Normal audit')}</h2>
                <ProtectedComponent role={'normal-audit-add-new-record'}>
                    <Link href={route('normal-audit.create', { lang })}>
                        <Button
                            variant={'outlined'}
                            endIcon={<PlusIcon className={'h-5'} />}>
                            {translate('Add new record')}
                        </Button>
                    </Link>
                </ProtectedComponent>
            </div>
            <div className={'mt-8'}>
                <Datatable
                    fromResource={true}
                    showNumber={true}
                    data={normal_audits}
                    datatableFilters={[
                        {
                            element: (
                                <Button
                                    onClick={() => setShowFilter(true)}
                                    endIcon={<FunnelIcon className={'h-4'} />}
                                    variant={'outlined'}>
                                    {translate('Filters')}
                                </Button>
                            ),
                        },
                    ]}
                    otherOptions={[
                        {
                            icon: <VisibilityIcon fontSize={'8'} />,
                            role: 'normal-audit-view-access',
                            handleClick: data => {
                                Inertia.get(
                                    route('normal-audit.show', {
                                        normal_audit: data.id,
                                        lang,
                                        active: 'all_information',
                                    }),
                                )
                            },
                        },
                    ]}
                    columns={[
                        {
                            name: 'Reported by',
                            key: 'reported_by.name',
                        },
                        {
                            name: 'Status',
                            key: 'status',
                            sort: true,
                        },
                        {
                            name: 'Reported on',
                            key: 'reported_on',
                            sort: true,
                            data_type: 'date',
                            format: 'YYYY-MM-DD hh:mm:A',
                        },
                        {
                            name: 'Audit start date',
                            key: 'audit_start_date',
                            sort: true,
                            data_type: 'date',
                            format: 'YYYY/MMM/DD',
                        },
                        {
                            name: 'Audit end date',
                            key: 'audit_end_date',
                            sort: true,
                            data_type: 'date',
                            format: 'YYYY/MMM/DD',
                        },
                        {
                            name: 'Confidentiality Level',
                            key: 'confidentiality_level.name',
                        },
                        {
                            name: 'File location',
                            key: 'file_location',
                            sort: true,
                        },
                        {
                            name: 'File version',
                            key: 'file_version',
                            sort: true,
                        },
                        {
                            name: 'Total Pages',
                            key: 'total_pages',
                            sort: true,
                        },
                        {
                            name: 'Total Files',
                            key: 'total_files',
                            sort: true,
                        },
                    ]}
                />
            </div>
            {showFilter && (
                <NormalAuditFilters
                    filters={filters}
                    reported_by={reported_by}
                    translate={translate}
                    onClose={() => {
                        setShowFilter(false)
                    }}
                />
            )}
        </Authenticated>
    )
}

export default NormalAuditIndex
