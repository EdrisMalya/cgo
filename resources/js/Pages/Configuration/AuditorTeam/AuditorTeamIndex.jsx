import React, { useState } from 'react'
import Authenticated from '@/Layouts/AuthenticatedLayout'
import useLanguage from '@/hooks/useLanguage'
import ConfigurationPageLinks from '@/Pages/Configuration/ConfigurationPageLinks'
import { Button, IconButton, Tooltip } from '@mui/material'
import {
    ArrowLeftIcon,
    PencilIcon,
    PlusIcon,
} from '@heroicons/react/24/outline'
import AuditorTeamForm from '@/Pages/Configuration/AuditorTeam/AuditorTeamForm'
import ProtectedComponent from '@/Components/ProtectedComponent'
import { ArrowRightIcon, TrashIcon } from '@heroicons/react/24/solid'
import { Link, useForm } from '@inertiajs/inertia-react'
import { useRecoilState } from 'recoil'
import { directionAtom } from '@/atoms/directionAtom'
import swal from 'sweetalert'
import { fullPageLoading } from '@/atoms/fullPageLoading'

const AuditorTeamIndex = ({ active, lang, teams }) => {
    const { translate } = useLanguage()
    const [form, setForm] = useState(false)
    const [team, setTeam] = useState(null)
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
                    route('auditor-team.destroy', { auditor_team: id, lang }),
                    {
                        onSuccess: () => {
                            setLoading[1](false)
                        },
                    },
                )
            }
        })
    }

    const handleEditAction = team => {
        setTeam(team)
        setForm(true)
    }

    return (
        <Authenticated
            active={'configuration'}
            title={translate('Auditor teams')}
            navBarOptions={
                <ConfigurationPageLinks active={active} lang={lang} />
            }>
            <div className={'flex items-center justify-between'}>
                <h2 className={'text-xl'}>{translate('Auditor teams')}</h2>
                <ProtectedComponent role={'auditor-team-create-team'}>
                    <Button
                        onClick={() => {
                            setTeam(null)
                            setForm(true)
                        }}
                        variant={'outlined'}
                        endIcon={<PlusIcon className={'h-4'} />}>
                        {translate('Add new team')}
                    </Button>
                </ProtectedComponent>
            </div>
            {teams.length < 1 ? (
                <p className={'mt-12 text-red-500 text-center'}>
                    {translate('No record found')}
                </p>
            ) : (
                <div>
                    <div className={'mt-3 flex flex-row flex-wrap space-x-2'}>
                        {teams?.map(item => (
                            <div
                                className={
                                    'inline-block p-2 border dark:border-gray-600 text-sm rounded-full m-1'
                                }
                                key={item?.id}>
                                <div
                                    className={
                                        'flex items-center space-x-2 px-1'
                                    }>
                                    <div>
                                        {translate(item?.name)}{' '}
                                        <span className={'text-xs'}>
                                            (
                                            {item?.status
                                                ? translate('Active')
                                                : translate('Inactive')}
                                            )
                                        </span>
                                    </div>
                                    <div>
                                        <ProtectedComponent
                                            role={'auditor-team-delete-team'}>
                                            <IconButton
                                                size={'small'}
                                                color={'error'}
                                                onClick={() =>
                                                    handleDeleteAction(item?.id)
                                                }>
                                                <TrashIcon className={'h-3'} />
                                            </IconButton>
                                        </ProtectedComponent>
                                        <ProtectedComponent
                                            role={'auditor-team-edit-team'}>
                                            <IconButton
                                                size={'small'}
                                                color={'warning'}
                                                onClick={() =>
                                                    handleEditAction(item)
                                                }>
                                                <PencilIcon className={'h-3'} />
                                            </IconButton>
                                        </ProtectedComponent>
                                        <ProtectedComponent
                                            role={
                                                'auditor-team-view-team-members'
                                            }>
                                            <Link
                                                href={route(
                                                    'auditor-team.show',
                                                    {
                                                        auditor_team: item?.id,
                                                        lang,
                                                    },
                                                )}>
                                                <Tooltip
                                                    title={translate(
                                                        'View members',
                                                    )}>
                                                    <IconButton
                                                        size={'small'}
                                                        color={'primary'}>
                                                        {dir === 'ltr' ? (
                                                            <ArrowRightIcon
                                                                className={
                                                                    'h-3'
                                                                }
                                                            />
                                                        ) : (
                                                            <ArrowLeftIcon
                                                                className={
                                                                    'h-3'
                                                                }
                                                            />
                                                        )}
                                                    </IconButton>
                                                </Tooltip>
                                            </Link>
                                        </ProtectedComponent>
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            )}
            {form && (
                <AuditorTeamForm
                    translate={translate}
                    team={team}
                    onClose={() => {
                        setTeam(null)
                        setForm(false)
                    }}
                />
            )}
        </Authenticated>
    )
}

export default AuditorTeamIndex
