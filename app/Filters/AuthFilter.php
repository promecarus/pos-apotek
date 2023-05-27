<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $except = [
            'auth/signup',
            'auth/checkEmailUnique',
            'auth/checkUsernameUnique',
            'auth/signupProcess',
            'auth/signin',
            'auth/signinProcess',
        ];

        $path = $request->uri->getPath();

        if (is_null(session()->get('signed_in')) && !in_array($path, $except)) {
            return redirect()
                ->to(base_url('/auth/signin'))
                ->with('message', 'Silakan sign in terlebih dahulu!')
                ->with('type', 'error');
        }

        if (!is_null(session()->get('signed_in')) && in_array($path, $except)) {
            return redirect()
                ->back()
                ->with('message', 'Anda sudah sign in.')
                ->with('type', 'info');
        }

        $restrictedPaths = [
            [
                'patterns' => [
                    'master/user*',
                    'master/*/delete/*',
                    'transaksi/*/delete/*',
                ],
                'minRoleId' => 1,
            ],
            [
                'patterns' => [
                    'master/kemasan*',
                    'master/obat*',
                    'master/pelanggan/update/*',
                    'transaksi/stok/update/*'
                ],
                'minRoleId' => 2,
            ],
        ];

        foreach ($restrictedPaths as $restrictedPath) {
            if (session()->get('role_id') > $restrictedPath['minRoleId'] && in_array(true, array_map(fn ($item) => fnmatch($item, $path), $restrictedPath['patterns']))) {
                return redirect()
                    ->back()
                    ->with('message', 'Anda tidak memiliki akses ke halaman tersebut.')
                    ->with('type', 'warning');
            }
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
