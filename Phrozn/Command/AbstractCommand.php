<?php
/**
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *          http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @category    Phrozn
 * @package     Phrozn\Runner\CommandLine
 * @author      Povilas Balzaravičius
 * @license     http://www.apache.org/licenses/LICENSE-2.0
 */

namespace Phrozn\Command;

use Symfony\Component\Console\Command\Command;
use Phrozn\Has;

/**
 * Phrozn command abstraction.
 */
abstract class AbstractCommand
    extends Command
    implements Has\Config
{
    protected $config;

    /**
     * Set configuration
     *
     * @param array $config Array of options
     *
     * @return \Phrozn\Has\Config
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }

    /**
     * Get configuration
     *
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * See whether given path is absolute or relative
     *
     * @param string $path Path to check
     *
     * @return boolean
     */
    protected function isAbsolute($path)
    {
        if (PHP_OS == 'WINNT' || PHP_OS == 'WIN32') {
            $pattern = '/^[a-zA-Z]:[\\\\\/]/';
            return preg_match($pattern, $path);
        } else {
            return $path{0} == '/';
        }
    }
}