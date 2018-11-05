<?php

namespace App\Http\Requests;

use App\Models\Pegawai;
use Illuminate\Foundation\Http\FormRequest;

class PegawaiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $data = Pegawai::find($this->pegawai);

        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'nip' => 'required|string|unique:pegawai,nip',
                    'nama' => 'required|string',
                    'skpd' => 'required|string',
                    'pangkat' => 'required|string',
                    'golongan' => 'required',
                    'jabatan' => 'required',
                    'status' => 'required'
                ];
            }
            case 'PUT':
            {
                return [
                    'nip' => 'required|string|unique:pegawai,nip,' . $data->id,
                    'nama' => 'required|string',
                    'skpd' => 'required|string',
                    'pangkat' => 'required|string',
                    'golongan' => 'required',
                    'jabatan' => 'required',
                    'status' => 'required'
                ];
            }
            case 'PATCH':
            {
                return [
                    'nip' => 'required|string|unique:pegawai,nip,' . $data->id,
                    'nama' => 'required|string',
                    'skpd' => 'required|string',
                    'pangkat' => 'required|string',
                    'golongan' => 'required',
                    'jabatan' => 'required',
                    'status' => 'required'
                ];
            }
            default:break;
        }
    }
}
