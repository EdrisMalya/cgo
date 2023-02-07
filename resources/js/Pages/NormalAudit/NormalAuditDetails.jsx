import React from 'react'
import Authenticated from '@/Layouts/AuthenticatedLayout'
import useLanguage from '@/hooks/useLanguage'
import NormalAuditLinks from '@/Pages/NormalAudit/NormalAuditLinks'
import { TabContext, TabList, TabPanel } from '@mui/lab'
import { Tab } from '@mui/material'
import { Inertia } from '@inertiajs/inertia'
import NormalAuditInformation from '@/Pages/NormalAudit/Tabs/NormalAuditInformation'
import useAuth from '@/hooks/useAuth'
import NormalAuditWatchHistory from './Tabs/NormalAuditWatchHistory'
import NormalAuditTimeLine from '@/Pages/NormalAudit/Tabs/NormalAuditTimeLine'

const NormalAuditDetails = ({
    active,
    lang,
    normal_audit,
    active_tab,
    watch_history,
}) => {
    const { translate } = useLanguage()
    const { isAllowed } = useAuth()

    return (
        <Authenticated
            title={translate('Normal audit document details')}
            active={'normal_audit'}
            navBarOptions={
                <NormalAuditLinks
                    active={active}
                    lang={lang}
                    translate={translate}
                />
            }>
            <TabContext value={active_tab}>
                <TabList
                    onChange={(event, value) => {
                        Inertia.get(
                            route(route().current(), {
                                ...route().params,
                                active: value,
                            }),
                        )
                    }}>
                    <Tab
                        value={'all_information'}
                        label={translate('All information')}
                    />
                    <Tab
                        className={`${
                            !isAllowed('normal-audit-seen-history-access') &&
                            '!hidden'
                        }`}
                        value={'document_timeline'}
                        label={translate('Document timeline')}
                    />
                    <Tab
                        className={`${
                            !isAllowed('normal-audit-seen-history-access') &&
                            '!hidden'
                        }`}
                        value={'watch_history'}
                        label={translate('Seen history')}
                    />
                </TabList>
                <TabPanel value={'all_information'}>
                    <NormalAuditInformation
                        translate={translate}
                        normal_audit={normal_audit?.data}
                        lang={lang}
                    />
                </TabPanel>
                <TabPanel value={'document_timeline'}>
                    <NormalAuditTimeLine
                        lang={lang}
                        translate={translate}
                        normal_audit={normal_audit?.data}
                    />
                </TabPanel>
                <TabPanel value={'watch_history'}>
                    <NormalAuditWatchHistory
                        translate={translate}
                        watch_history={watch_history}
                    />
                </TabPanel>
            </TabContext>
        </Authenticated>
    )
}

export default NormalAuditDetails
