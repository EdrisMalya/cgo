import React from 'react'
import ProtectedComponent from '@/Components/ProtectedComponent'
import { Link } from '@inertiajs/inertia-react'
import { Button } from '@mui/material'

const NormalAuditLinks = ({ translate, lang, active }) => {
    const activeLink = active => {
        switch (active) {
            case 'home_page':
                return 'home-page'
            case 'reporting':
                return 'reporting'
        }
    }

    return (
        <>
            <ProtectedComponent role={'normal-audit-access'}>
                <Link href={route('normal-audit.index', { lang })}>
                    <Button
                        variant={
                            activeLink(active) === 'home-page'
                                ? 'contained'
                                : 'outlined'
                        }>
                        {translate('Normal audit')}
                    </Button>
                </Link>
            </ProtectedComponent>
            {/*<ProtectedComponent role={'normal-audit-access'}>
                <Link href={''}>
                    <Button variant={activeLink(active) === 'reporting'?'contained':'outlined'}>
                        {translate('Reporting')}
                    </Button>
                </Link>
            </ProtectedComponent>*/}
        </>
    )
}

export default NormalAuditLinks
