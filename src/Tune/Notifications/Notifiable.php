<?php

namespace Tune\Notifications;

trait Notifiable
{
    use HasDatabaseNotifications, RoutesNotifications;
}
