<?php

namespace Tune\Contracts\Mail;

interface Attachable
{
    /**
     * Get an attachment instance for this entity.
     *
     * @return \Tune\Mail\Attachment
     */
    public function toMailAttachment();
}
