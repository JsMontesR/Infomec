<?php

namespace App\Imports;

use App\RepoDiagnostico;
use Maatwebsite\Excel\Concerns\ToModel;

class RepoImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $registro)
    {
        return new RepoDiagnostico([
            'enciende' => $registro->enciende,
         'apaga' =>$registro->apaga,
         'inetcable' =>$registro->inetcable,
         'soinicia' =>$registro->soinicia,
         'ruidos' =>$registro->ruidos,
         'suena' =>$registro->suena,
         'lento' =>$registro->lento,
         'calienta' =>$registro->calienta,
         'daimagen' =>$registro->daimagen,
         'energiza' =>$registro->energiza,
         'pantazul' =>$registro->pantazul,
         'pantpixel' =>$registro->pantpixel,
         'pantnegra' =>$registro->pantnegra,
         'msgactiv' =>$registro->msgactiv,
         'alarmdisk' =>$registro->alarmdisk,
         'horacorrecta' =>$registro->horacorrecta,
         'usbfunc' =>$registro->usbfunc,
         'filecorrupt' =>$registro->filecorrupt,
         'bloquea' =>$registro->bloquea,
         'horasdia' =>$registro->horasdia,
         'aniocompra' =>$registro->aniocompra,
         'spam' =>$registro->spam,
         'fallahard' =>$registro->fallahard,
         'fallasoft' =>$registro->fallasoft
        ]);
    }
}
