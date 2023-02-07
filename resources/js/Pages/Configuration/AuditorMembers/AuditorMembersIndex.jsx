import React, { useState } from 'react'
import ConfigurationPageLinks from '@/Pages/Configuration/ConfigurationPageLinks'
import Authenticated from '@/Layouts/AuthenticatedLayout'
import useLanguage from '@/hooks/useLanguage'
import { Button } from '@mui/material'
import { PlusIcon } from '@heroicons/react/24/outline'
import { useRecoilState } from 'recoil'
import { directionAtom } from '@/atoms/directionAtom'
import { fullPageLoading } from '@/atoms/fullPageLoading'
import { useForm } from '@inertiajs/inertia-react'
import swal from 'sweetalert'
import AuditorTeamForm from '@/Pages/Configuration/AuditorTeam/AuditorTeamForm'
import AuditorMemberForm from '@/Pages/Configuration/AuditorMembers/AuditorMemberForm'
import ProtectedComponent from '@/Components/ProtectedComponent'
import Datatable from '@/Components/Datatable/Datatable'

const AuditorMembersIndex = ({ active, lang, members }) => {
    const { translate } = useLanguage()
    const [form, setForm] = useState(false)
    const [member, setMember] = useState(null)
    const [dir] = useRecoilState(directionAtom)
    const setLoading = useRecoilState(fullPageLoading)
    const { delete: deleteAction } = useForm()

    const handleDeleteAction = id => {
        swal({
            icon: 'warning',
            title: `Are you sure you want to delete?`,
            buttons: true,
        }).then(res => {
            if (res) {
                setLoading[1](true)
                deleteAction(
                    route('auditor-member.destroy', {
                        auditor_member: id,
                        lang,
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

    const handleEditAction = member => {
        setMember(member)
        setForm(true)
    }

    return (
        <Authenticated
            active={'configuration'}
            title={translate('Auditor members')}
            navBarOptions={
                <ConfigurationPageLinks active={active} lang={lang} />
            }>
            <div className={'flex items-center justify-between'}>
                <h2 className={'text-xl'}>{translate('Auditor members')}</h2>

                <ProtectedComponent role={'auditor-members-create-member'}>
                    <Button
                        onClick={() => {
                            setMember(null)
                            setForm(true)
                        }}
                        variant={'outlined'}
                        endIcon={<PlusIcon className={'h-4'} />}>
                        {translate('Add new member')}
                    </Button>
                </ProtectedComponent>
            </div>
            <div className={'mt-4'}>
                <Datatable
                    data={members}
                    editRole={'auditor-members-edit-member'}
                    showNumber={true}
                    handleEditAction={member => {
                        handleEditAction(member)
                    }}
                    deleteRole={'auditor-members-delete-member'}
                    columns={[
                        {
                            name: 'First name',
                            key: 'first_name',
                            sort: true,
                        },
                        {
                            name: 'Last name',
                            key: 'last_name',
                            sort: true,
                        },
                        {
                            name: 'Email',
                            key: 'email',
                            sort: true,
                        },
                        {
                            name: 'Phone number',
                            key: 'phone_number',
                            sort: true,
                        },
                        {
                            name: 'Status',
                            key: 'status',
                            data_type: 'boolean',
                            sort: true,
                        },
                        {
                            name: 'Created at',
                            key: 'created_at',
                            data_type: 'date',
                            format: 'YYYY-MM-DD hh:mm A',
                            sort: true,
                        },
                    ]}
                />
            </div>
            {form && (
                <AuditorMemberForm
                    translate={translate}
                    member={member}
                    onClose={() => {
                        setMember(null)
                        setForm(false)
                    }}
                />
            )}
        </Authenticated>
    )
}

export default AuditorMembersIndex
