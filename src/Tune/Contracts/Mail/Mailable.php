<?php

namespace Tune\Contracts\Mail;

use Tune\Contracts\Queue\Factory as Queue;

interface Mailable
{
    /**
     * Send the message using the given mailer.
     *
     * @param  \Tune\Contracts\Mail\Factory|\Tune\Contracts\Mail\Mailer  $mailer
     * @return \Tune\Mail\SentMessage|null
     */
    public function send($mailer);

    /**
     * Queue the given message.
     *
     * @param  \Tune\Contracts\Queue\Factory  $queue
     * @return mixed
     */
    public function queue(Queue $queue);

    /**
     * Deliver the queued message after (n) seconds.
     *
     * @param  \DateTimeInterface|\DateInterval|int  $delay
     * @param  \Tune\Contracts\Queue\Factory  $queue
     * @return mixed
     */
    public function later($delay, Queue $queue);

    /**
     * Set the recipients of the message.
     *
     * @param  object|array|string  $address
     * @param  string|null  $name
     * @return self
     */
    public function cc($address, $name = null);

    /**
     * Set the recipients of the message.
     *
     * @param  object|array|string  $address
     * @param  string|null  $name
     * @return $this
     */
    public function bcc($address, $name = null);

    /**
     * Set the recipients of the message.
     *
     * @param  object|array|string  $address
     * @param  string|null  $name
     * @return $this
     */
    public function to($address, $name = null);

    /**
     * Set the locale of the message.
     *
     * @param  string  $locale
     * @return $this
     */
    public function locale($locale);

    /**
     * Set the name of the mailer that should be used to send the message.
     *
     * @param  string  $mailer
     * @return $this
     */
    public function mailer($mailer);
}
