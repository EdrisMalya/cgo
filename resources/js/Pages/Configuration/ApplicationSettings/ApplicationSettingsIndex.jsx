import React from 'react'
import Authenticated from '@/Layouts/AuthenticatedLayout'
import useLanguage from '@/hooks/useLanguage'
import ConfigurationPageLinks from '@/Pages/Configuration/ConfigurationPageLinks'
import { Button, ButtonGroup } from '@mui/material'
import ProtectedComponent from '@/Components/ProtectedComponent'
import { Link } from '@inertiajs/inertia-react'
import AllowedExtensionsIndex from '@/Pages/Configuration/ApplicationSettings/AllowedExtensions/AllowedExtensionsIndex'

const ApplicationSettingsIndex = ({ active, lang, active_module }) => {
    const { translate } = useLanguage()

    const activeComponent = () => {
        switch (active_module) {
            case 'allowed-extensions':
                return <AllowedExtensionsIndex translate={translate} />
            default:
                return (
                    <div>
                        <h2 className={'text-xl text-center mt-32'}>
                            {translate('Application setting section')}
                        </h2>
                    </div>
                )
        }
    }

    return (
        <Authenticated
            title={translate('Application settings')}
            navBarOptions={
                <ConfigurationPageLinks active={active} lang={lang} />
            }
            active={'configuration'}>
            <div className={'grid grid-cols-6'}>
                <div className={'col-span-1 border-r dark:border-gray-600'}>
                    <ButtonGroup fullWidth={true} orientation={'vertical'}>
                        <ProtectedComponent role={'allowed-extensions-access'}>
                            <Link
                                href={route('allowed-extensions.index', {
                                    lang,
                                })}>
                                <Button
                                    fullWidth={true}
                                    variant={
                                        active_module === 'allowed-extensions'
                                            ? 'contained'
                                            : 'outlined'
                                    }>
                                    {translate('Allowed extensions')}
                                </Button>
                            </Link>
                        </ProtectedComponent>
                    </ButtonGroup>
                </div>
                <div className="col-span-5 pl-4">{activeComponent()}</div>
            </div>
        </Authenticated>
    )
}

export default ApplicationSettingsIndex
