<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\GuruModel;

class UpdateGuruPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'nama_guru'         => 'required'.$this->GuruModel->id_guru,
                'no_tlpn'           => 'required'.$this->GuruModel->id_guru,
                'nik'               => 'required|unique:guru,nik'.$this->GuruModel->id_guru,
                'jenis_kelamin'     => 'required'.$this->GuruModel->id_guru,
                'agama'             => 'required'.$this->GuruModel->id_guru,
                'alamat'            => 'required'.$this->GuruModel->id_guru,
                'lulusan'           => 'required'.$this->GuruModel->id_guru,
                'universitas'       => 'required'.$this->GuruModel->id_guru,
                'kewarganegaraan'   => 'required'.$this->GuruModel->id_guru
        ];
    }
}
