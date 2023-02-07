import Datatable from '@/Components/Datatable/Datatable'
import { usePage } from '@inertiajs/inertia-react'

const NormalAuditWatchHistory = ({ translate, watch_history }) => {
    return (
        <div>
            <Datatable
                fromResource={true}
                data={watch_history}
                datatableRoute={route(route().current(), { ...route().params })}
                actions={false}
                columns={[
                    {
                        name: translate('User name'),
                        key: 'user.name',
                    },
                    {
                        name: translate('Email'),
                        key: 'user.email',
                    },
                    {
                        name: translate('Seen on'),
                        key: 'seen_on',
                        data_type: 'date',
                        format: 'YYYY MMMM DD hh:mm:ss A',
                    },
                ]}
            />
        </div>
    )
}

export default NormalAuditWatchHistory
