import React, { useState } from 'react'
import ConfigurationPageLinks from '@/Pages/Configuration/ConfigurationPageLinks'
import useLanguage from '@/hooks/useLanguage'
import Authenticated from '@/Layouts/AuthenticatedLayout'
import ProtectedComponent from '@/Components/ProtectedComponent'
import { Avatar, Button, Chip } from '@mui/material'
import { PlusIcon } from '@heroicons/react/24/outline'
import { useRecoilState } from 'recoil'
import { directionAtom } from '@/atoms/directionAtom'
import { fullPageLoading } from '@/atoms/fullPageLoading'
import { useForm } from '@inertiajs/inertia-react'
import TeamMembersForm from '@/Pages/Configuration/AuditorTeam/TeamMember/TeamMembersForm'
import swal from 'sweetalert'

const TeamMembersIndex = ({ active, lang, team, auditor_members }) => {
    const { translate } = useLanguage()
    const [form, setForm] = useState(false)
    const [member, setMember] = useState(null)
    const [dir] = useRecoilState(directionAtom)
    const setLoading = useRecoilState(fullPageLoading)
    const { delete: deleteAction } = useForm()

    const handleDelete = id => {
        swal({
            icon: 'warning',
            title: translate('Are you sure you want to delete'),
            buttons: true,
        }).then(res => {
            if (res) {
                setLoading[1](true)
                deleteAction(
                    route('auditor-team.destroy', {
                        lang,
                        type: 'delete-member',
                        auditor_team: team.id,
                        member_id: id,
                    }),
                    {
                        onSuccess: () => {
                            setLoading[1](false)
                        },
                    },
                )
            }
        })
    }

    return (
        <Authenticated
            active={'configuration'}
            title={translate('Auditor members')}
            navBarOptions={
                <ConfigurationPageLinks active={active} lang={lang} />
            }>
            <div className={'flex items-center justify-between'}>
                <h2 className={'text-xl'}>
                    {translate('[team_name] auditor team members', {
                        team_name: team.name,
                    })}
                </h2>
                <ProtectedComponent role={'auditor-team-add-member-to-team'}>
                    <Button
                        onClick={() => {
                            setMember(null)
                            setForm(true)
                        }}
                        size={'small'}
                        variant={'outlined'}
                        endIcon={<PlusIcon className={'h-4'} />}>
                        {translate('Add new member')}
                    </Button>
                </ProtectedComponent>
            </div>
            <div className={'mt-4'}>
                {team.members?.length < 1 ? (
                    <p className={'text-red-500 text-center py-4'}>
                        {translate('No record found')}
                    </p>
                ) : (
                    <div className={'space-x-1 space-y-1'}>
                        {team.members?.map(member => (
                            <Chip
                                onDelete={() => handleDelete(member.id)}
                                avatar={
                                    <Avatar
                                        src={
                                            route().t.url +
                                            '/storage/' +
                                            member.member.image
                                        }
                                    />
                                }
                                label={
                                    member.member.first_name +
                                    ' ' +
                                    member.member.last_name
                                }
                            />
                        ))}
                    </div>
                )}
            </div>
            {form && (
                <TeamMembersForm
                    auditor_members={auditor_members}
                    translate={translate}
                    team={team}
                    onClose={() => {
                        setMember(null)
                        setForm(false)
                    }}
                />
            )}
        </Authenticated>
    )
}

export default TeamMembersIndex
