<?php


namespace App\validate;


class IDMustBePositiveInt extends BaseValidate
{
    public function store(Request $request){
        $validatedData = $request->validate([
            'id' => 'required|isPositiveInteger',
            ]);
        if ($validatedData->fails()) {
            return redirect('/')
            ->withInput();         }

        // 验证通过，存储到数据库...
    }


//    protected $rule = [
//        'id' => 'require|isPositiveInteger',
//        'num'=>'in:1,2,3'
//    ];


    protected function isPositiveInteger($value,$rule='',$data='',$field='')
    {
        if (is_numeric($value) && is_int($value + 0) && ($value + 0) >0){
            return true;
        }else{
            return $field.'必须是正整数';
        }
    }
}
