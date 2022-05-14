 <div class="empty_entry_block row mb-2" style="border: 1px solid rgba(0,0,0,0.2);height:auto;border-radius:3px">
    <div class="block_start_end_time col-2">
       <div class="row mb-2">
          <label class="col-3 col-form-label">от:</label>
          <div class="col-6">
             <select class="form-control form-control-border start p-0 text-center" style="background-color: #E9ECEF;border-radius:3px">
                @for ($i = 0; $i <= 82800; $i +=1800) <option value="{{ $i }}">{{ gmdate('H:i', $i) }}</option>
                   @endfor
             </select>
          </div>
       </div>
       <div class="row mb-3">
          <label class="col-3 col-form-label">до:</label>
          <div class="col-6">
             <select class="form-control form-control-border end p-0 text-center" style="background-color: #E9ECEF;border-radius:3px">
                @for ($i = 0; $i <= 82800; $i +=1800) <option value="{{ $i }}">{{ gmdate('H:i', $i) }}</option>
                   @endfor
             </select>
          </div>
       </div>
       <div class="">
          <div class="form-group text-center">
             <input onClick="save_entries_to_db(this)" type="button" class="save_entries_to_db btn btn-primary" data-personal_id={{ $personal->id }} value="Сохранить">
          </div>
       </div>
    </div>
    <div class="block_for_selected_dates col-10 m-0 p-1" style="min-height: 50px;border-left:1px solid rgba(0,0,0,0.2)">
       {{-- <p class="selected_day"><span>11.11.2011</span><i class="fa fa-times"></i></p>
                                <p class="selected_day_for_entry"><span>11.11.2011</span><i class="fa fa-times"></i></p>
                                <p class="selected_day_disabled"><span>11.11.2011</span><i class="fa fa-times"></i></p> --}}
    </div>
 </div>