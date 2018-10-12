<?php

namespace backend\components\notifiers;

interface InfoEventInterface
{
    const EVENT_INFO_INIT = 'component_notifiers_info_init';
    const EVENT_INFO_READY = 'component_notifiers_info_ready';
}