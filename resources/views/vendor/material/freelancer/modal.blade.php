<div class="modal fade" id="modalAddHistory" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add History</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="modal_division" class="col-sm-2 control-label">Division</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <select name="modal_division" id="modal_division" class="selectpicker" data-live-search="true" required="true">
                                    <option value=""></option>
                                    @foreach($divisions as $row)
                                        <option value="{{ $row->division_id }}">{{ $row->division_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <small class="help-block"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_department" class="col-sm-2 control-label">Department</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <select name="modal_department" id="modal_department" class="selectpicker" data-live-search="true" required="true">
                                    <option value=""></option>
                                </select>
                            </div>
                            <small class="help-block"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_position" class="col-sm-2 control-label">Position</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <select name="modal_position" id="modal_position" class="selectpicker" data-live-search="true" required="true">
                                    <option value=""></option>
                                    @foreach($positions as $row)
                                        <option value="{{ $row->position_id }}">{{ $row->position_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <small class="help-block"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_start_date" class="col-sm-2 control-label">Start Date</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <input type="text" class="form-control input-sm input-mask" name="modal_start_date" id="modal_start_date" placeholder="e.g 17/08/1945" required="true" maxlength="10" value="{{ old('modal_start_date') }}" autocomplete="off" data-mask="00/00/0000">
                            </div>
                            <small class="help-block"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_end_date" class="col-sm-2 control-label">End Date</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <input type="text" class="form-control input-sm input-mask" name="modal_end_date" id="modal_end_date" placeholder="e.g 17/08/1945" required="true" maxlength="10" value="{{ old('modal_end_date') }}" autocomplete="off" data-mask="00/00/0000">
                            </div>
                            <small class="help-block"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_honor_type" class="col-sm-2 control-label">Honor Type</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <select name="modal_honor_type" id="modal_honor_type" class="selectpicker" data-live-search="true" required="true">
                                    <option value=""></option>
                                    @foreach($honor_types as $key => $value)
                                        <option value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <small class="help-block"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modal_honor" class="col-sm-2 control-label">Honor</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                                <input type="text" class="form-control input-sm input-mask" name="modal_honor" id="modal_honor" placeholder="Honor" required="true" maxlength="20" value="{{ old('modal_honor') }}" autocomplete="off" data-mask="####################">
                            </div>
                            <small class="help-block"></small>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary waves-effect btn-save-history">Save</button>
                <button type="button" class="btn btn-danger waves-effect btn-close-history" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>