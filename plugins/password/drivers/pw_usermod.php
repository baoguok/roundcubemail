<?php

/**
 * pw_usermod Driver
 *
 * Driver that adds functionality to change the systems user password via
 * the 'pw usermod' command.
 *
 * For installation instructions please read the README file.
 *
 * @version 2.0
 *
 * @author Alex Cartwright <acartwright@mutinydesign.co.uk>
 * @author Adamson Huang <adomputer@gmail.com>
 *
 * Copyright (C) The Roundcube Dev Team
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see https://www.gnu.org/licenses/.
 */

class rcube_pw_usermod_password
{
    public function save($currpass, $newpass, $username)
    {
        $cmd = rcmail::get_instance()->config->get('password_pw_usermod_cmd', 'sudo /usr/sbin/pw usermod -h 0 -n');
        $cmd .= ' ' . escapeshellarg($username) . ' > /dev/null';

        $handle = popen($cmd, 'w');
        fwrite($handle, "{$newpass}\n");

        if (pclose($handle) == 0) {
            return PASSWORD_SUCCESS;
        }

        rcube::raise_error("Password plugin: Unable to execute {$cmd}", true);

        return PASSWORD_ERROR;
    }
}
