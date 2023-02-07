import React, { useEffect } from 'react'
import Select2 from '@/Components/Select2'
import { CGO_REDUCER_ACTIONS } from '@/Pages/CGOReducer/CGOReducerActions'
import { Avatar, Chip } from '@mui/material'
import ProtectedComponent from '@/Components/ProtectedComponent'

const NaAuditedByComponent = ({
    translate,
    dispatch,
    data,
    teams,
    setData,
    normalAuditForm,
}) => {
    const [members, setMembers] = React.useState([])
    React.useEffect(() => {
        if (members.length > 0) {
            setData('members', members)
        }
    }, [members])

    useEffect(() => {
        if (normalAuditForm && normalAuditForm.data.auditorTeam) {
            let members = normalAuditForm.data.members.map(member => {
                return {
                    full_name: member.name,
                    image: member.image,
                    id: member.id,
                }
            })
            setMembers(members)
            dispatch({
                type: CGO_REDUCER_ACTIONS.AUDITOR_TEAM_CHANGED,
                payload: {
                    team_id: {
                        label: normalAuditForm.data.auditorTeam.name,
                        id: normalAuditForm.data.auditorTeam.id,
                    },
                    members: members,
                },
            })
            setData('auditor_team_id', normalAuditForm.data.auditorTeam.id)
        }
    }, [normalAuditForm])

    const returnBody = () => {
        return (
            <>
                <Select2
                    data={teams}
                    value={data.audited_by}
                    selectLabel={'name'}
                    placeholder={translate('Audited by')}
                    selectValue={'id'}
                    label={translate('Auditor team')}
                    otherOptions={'members'}
                    onChange={value => {
                        setData('auditor_team_id', value.value)
                        let members = value.otherOptions.map(item => {
                            return {
                                full_name:
                                    item.member.first_name +
                                    ' ' +
                                    item.member.last_name,
                                image: item.member.image,
                                id: item.member.id,
                            }
                        })
                        setMembers(members)
                        dispatch({
                            type: CGO_REDUCER_ACTIONS.AUDITOR_TEAM_CHANGED,
                            payload: {
                                team_id: value,
                                members: members,
                            },
                        })
                    }}
                />
                {data.audited_by && data.auditor_members.length > 0 && (
                    <div
                        className={
                            'mt-4 border-l ml-4 pl-4 dark:border-gray-600'
                        }>
                        <p className={'py-4 text-lg'}>
                            {translate('[team_name] members', {
                                team_name: data.audited_by.label,
                            })}
                        </p>
                        {data.auditor_members?.map(member => (
                            <Chip
                                variant={'outlined'}
                                avatar={
                                    <Avatar
                                        src={
                                            route().t.url +
                                            '/storage/' +
                                            member.image
                                        }
                                    />
                                }
                                className={'!m-1 '}
                                label={member.full_name}
                                onDelete={() => {
                                    let filtered_members =
                                        data.auditor_members.filter(item => {
                                            return item.id !== member.id
                                        })
                                    dispatch({
                                        type: CGO_REDUCER_ACTIONS.AUDITOR_TEAM_MEMBER_CHANGED,
                                        payload: {
                                            members: filtered_members,
                                        },
                                    })
                                    setMembers(filtered_members)
                                }}
                            />
                        ))}
                    </div>
                )}
            </>
        )
    }

    return (
        <div className={'mt-4'}>
            {normalAuditForm ? (
                <ProtectedComponent role={'edit-report-edit-auditor-team'}>
                    {returnBody()}
                </ProtectedComponent>
            ) : (
                returnBody()
            )}
        </div>
    )
}

export default NaAuditedByComponent
