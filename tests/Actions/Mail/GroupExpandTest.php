<?php

namespace Roundcube\Tests\Actions\Mail;

use Roundcube\Tests\ActionTestCase;

/**
 * Test class to test rcmail_action_mail_group_expand
 */
class GroupExpandTest extends ActionTestCase
{
    /**
     * Class constructor
     */
    public function test_class()
    {
        $object = new \rcmail_action_mail_group_expand();

        $this->assertInstanceOf(\rcmail_action::class, $object);
    }
}
