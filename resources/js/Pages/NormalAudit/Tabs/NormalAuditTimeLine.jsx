import * as React from 'react'
import Timeline from '@mui/lab/Timeline'
import TimelineItem from '@mui/lab/TimelineItem'
import TimelineSeparator from '@mui/lab/TimelineSeparator'
import TimelineConnector from '@mui/lab/TimelineConnector'
import TimelineContent from '@mui/lab/TimelineContent'
import TimelineOppositeContent from '@mui/lab/TimelineOppositeContent'
import TimelineDot from '@mui/lab/TimelineDot'
import CloseIcon from '@mui/icons-material/Close'
import Typography from '@mui/material/Typography'
import DoneIcon from '@mui/icons-material/Done'
import dayjs from 'dayjs'
import swal from 'sweetalert'
import { useForm } from '@inertiajs/inertia-react'
import { LoadingButton } from '@mui/lab'
import ProtectedComponent from '@/Components/ProtectedComponent'

export default function NormalAuditTimeLine({ normal_audit, translate, lang }) {
    const { post, processing, setData } = useForm({
        type: null,
    })

    const handleApprove = type => {
        swal({
            icon: 'warning',
            title: translate('Are you sure you'),
            buttons: true,
        }).then(res => {
            if (res) {
                setData('type', type)
                post(
                    route('normal-audit.process', {
                        lang,
                        type,
                        normal_audit_id: normal_audit.id,
                    }),
                )
            }
        })
    }
    return (
        <Timeline>
            <TimelineItem>
                <TimelineOppositeContent
                    sx={{ m: 'auto 0' }}
                    align="right"
                    variant="body2"
                    color="text.secondary">
                    {dayjs(normal_audit.reported_on).format(
                        'YYYY-MM-DD hh:mm a',
                    )}
                </TimelineOppositeContent>
                <TimelineSeparator>
                    <TimelineConnector />
                    <TimelineDot color={'success'} variant="outlined">
                        <DoneIcon color={'success'} />
                    </TimelineDot>
                    <TimelineConnector />
                </TimelineSeparator>
                <TimelineContent sx={{ py: '12px', px: 2 }}>
                    <Typography variant="h6" component="span">
                        {translate('Created by')}
                    </Typography>
                    <Typography>{normal_audit.reported_by.name}</Typography>
                </TimelineContent>
            </TimelineItem>
            {normal_audit.reviewed_by ? (
                <>
                    <TimelineItem>
                        <TimelineOppositeContent
                            sx={{ m: 'auto 0' }}
                            align="right"
                            variant="body2"
                            color="text.secondary">
                            {dayjs(normal_audit.reviewed_by_date).format(
                                'YYYY-MM-DD hh:mm a',
                            )}
                        </TimelineOppositeContent>
                        <TimelineSeparator>
                            <TimelineConnector />
                            <TimelineDot color={'success'} variant="outlined">
                                <DoneIcon color={'success'} />
                            </TimelineDot>
                            <TimelineConnector />
                        </TimelineSeparator>
                        <TimelineContent sx={{ py: '12px', px: 2 }}>
                            <Typography variant="h6" component="span">
                                {translate('Reviewed by')}
                            </Typography>
                            <Typography>
                                {normal_audit.reviewed_by.name}
                            </Typography>
                        </TimelineContent>
                    </TimelineItem>
                    {normal_audit.approved_by ? (
                        <TimelineItem>
                            <TimelineOppositeContent
                                sx={{ m: 'auto 0' }}
                                align="right"
                                variant="body2"
                                color="text.secondary">
                                {dayjs(normal_audit.approved_by_date).format(
                                    'YYYY-MM-DD hh:mm a',
                                )}
                            </TimelineOppositeContent>
                            <TimelineSeparator>
                                <TimelineConnector />
                                <TimelineDot
                                    color={'success'}
                                    variant="outlined">
                                    <DoneIcon color={'success'} />
                                </TimelineDot>
                                <TimelineConnector />
                            </TimelineSeparator>
                            <TimelineContent sx={{ py: '12px', px: 2 }}>
                                <Typography variant="h6" component="span">
                                    {translate('Approved by')}
                                </Typography>
                                <Typography>
                                    {normal_audit.approved_by.name}
                                </Typography>
                            </TimelineContent>
                        </TimelineItem>
                    ) : (
                        <TimelineItem>
                            <TimelineSeparator>
                                <TimelineConnector />
                                <TimelineDot color={'error'} variant="outlined">
                                    <CloseIcon color={'error'} />
                                </TimelineDot>
                                <TimelineConnector />
                            </TimelineSeparator>
                            <TimelineContent sx={{ py: '12px', px: 2 }}>
                                <Typography
                                    variant="h6"
                                    component="span"
                                    color={'indianred'}>
                                    {translate('Document not approved yet')}
                                </Typography>
                                <ProtectedComponent
                                    role={
                                        'normal-audit-approve-document-access'
                                    }>
                                    <div>
                                        <LoadingButton
                                            onClick={() =>
                                                handleApprove('approve')
                                            }
                                            loading={processing}
                                            size={'small'}
                                            variant={'outlined'}
                                            endIcon={
                                                <DoneIcon fontSize={'small'} />
                                            }>
                                            {translate('Approve')}
                                        </LoadingButton>
                                    </div>
                                </ProtectedComponent>
                            </TimelineContent>
                        </TimelineItem>
                    )}
                </>
            ) : (
                <>
                    <TimelineItem>
                        <TimelineSeparator>
                            <TimelineConnector />
                            <TimelineDot color={'error'} variant="outlined">
                                <CloseIcon color={'error'} />
                            </TimelineDot>
                            <TimelineConnector />
                        </TimelineSeparator>
                        <TimelineContent sx={{ py: '12px', px: 2 }}>
                            <Typography
                                variant="h6"
                                component="span"
                                color={'indianred'}>
                                {translate('Document not reviewed yet')}
                            </Typography>
                            <ProtectedComponent
                                role={'normal-audit-review-document-access'}>
                                <div>
                                    <LoadingButton
                                        onClick={() => handleApprove('review')}
                                        loading={processing}
                                        size={'small'}
                                        variant={'outlined'}
                                        endIcon={
                                            <DoneIcon fontSize={'small'} />
                                        }>
                                        {translate('I have reviewed')}
                                    </LoadingButton>
                                </div>
                            </ProtectedComponent>
                        </TimelineContent>
                    </TimelineItem>
                </>
            )}
        </Timeline>
    )
}
