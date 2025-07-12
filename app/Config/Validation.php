<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
    public array $mahasiswaValidate = [
        'nama' => [
            'rules' => 'required|alpha_space',
            'errors' => [
            'required' => '{field} harus di isi',
            'alpha_space' => '{field} tidak boleh mengandung simbol',
            ]
        ],
        'npm' => [
            'rules' => 'required|numeric',
            'errors' => [
            'required' => '{field} harus di isi',
            'numeric' => '{field} tidak boleh mengandung simbol atau huruf',
            ]
        ],
        'email' => [
            'rules' => 'required|valid_email',
            'errors' => [
            'required' => '{field} harus di isi',
            'valid_email' => '{field} tidak sesuai format',
            ]
        ],
        'jurusan' => [
            'rules' => 'in_list[Teknik Informatika,Sistem Informasi,Hukum,Kesehatan Masyarakat]',
            'errors' => [
            'in_list' => '{field} harus di pilih',
            ]
        ],
    ];
}
