<?php

namespace App\Models\Ride\Traits\Attribute;

/**
 * Class UserAttribute
 * @package App\Models\Access\User\Traits\Attribute
 */
trait RideAttribute
{


    public function getPictureAttribute()
    {
        return $this->getPicture();
    }

    /**
     * @param bool $size
     * @return mixed
     */
    public function getPicture($size = false)
    {
        if (! $size) $size = config('gravatar.default.size');
        return gravatar()->get($this->email, ['size' => $size]);
    }



    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="' . route('admin.menu.edit', $this) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></a> ';
    }


    /**
     * @return string
     */
    public function getStatusButtonAttribute()
    {
        if ($this->id) {
            switch ($this->status) {
                case 0:
                    return '<a href="' . route('admin.menu.mark', [
                        $this,
                        1
                    ]) . '" class="btn btn-xs btn-success"><i class="fa fa-play" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.access.users.activate') . '"></i></a> ';
                // No break

                case 1:
                    return '<a href="' . route('admin.menu.mark', [
                        $this,
                        0
                    ]) . '" class="btn btn-xs btn-warning"><i class="fa fa-pause" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.access.users.deactivate') . '"></i></a> ';
                // No break

                default:
                    return '';
                // No break
            }
        }

        return '';
    }


    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if ($this->id) {
            return '<a href="' . route('admin.menu.destroy', $this) . '"
                 data-method="delete"
                 data-trans-button-cancel="' . trans('buttons.general.cancel') . '"
                 data-trans-button-confirm="' . trans('buttons.general.crud.delete') . '"
                 data-trans-title="' . trans('strings.backend.general.are_you_sure') . '"
                 class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></a> ';
        }

        return '';
    }




    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        if ($this->deleted_at) {
            return $this->getRestoreButtonAttribute() .
                $this->getDeletePermanentlyButtonAttribute();
        }

        return

            $this->getEditButtonAttribute() .

            $this->getStatusButtonAttribute() .

            $this->getDeleteButtonAttribute();
    }


    public function getRestoreButtonAttribute()
    {
        return '<a href="' . route('admin.menu.restore', $this) . '" name="restore_user" class="btn btn-xs btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.access.users.restore_user') . '"></i></a> ';
    }


    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute()
    {
        return '<a href="' . route('admin.menu.delete-permanently', $this) . '" name="delete_user_perm" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.access.users.delete_permanently') . '"></i></a> ';
    }

}
