<center>
  <h1>Start Creating Amazing Things.</h1>
  <p>Create A New Project</p>
</center>
<div class="content">
    <form class="form-horizontal" method="post" style="margin-top: 6%" action="<?php echo URL ?>upload/upload">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <div class="col-sm-9">
              <label class="control-label" for="username">Project Name</label>
              <input type="text" placeholder="Your Project. Name" name="project_name" class="form-control" id="project_name" maxlength="64" required="required">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-9">
              <label class="control-label" for="email">Description</label>
              <textarea type="text" placeholder="Describe Your Project..." name="project_desc" class="form-control" id="desc" required="required"></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="drag-and-drop"></div>
        </div>
        <div class="col-sm-3">
          <div class="drag-and-drop"></div>
        </div>
        <div class="col-sm-3">
          <div class="drag-and-drop"></div>
        </div>
      </div>
      <div class="row" style="padding-left: 20px;">
        <div class="col-md-3">
          <div class="controls span2">
              <label class="checkbox">
                  <input type="checkbox" value="artdesign" name="tags[]" id="inlineCheckbox1"> Art & Design
              </label>
              <label class="checkbox">
                  <input type="checkbox" value="javascriptjquery" name="tags[]" id="inlineCheckbox2"> JavaScript & JQuery
              </label>
              <label class="checkbox">
                  <input type="checkbox" value="webdesign" name="tags[]" id="inlineCheckbox3"> Web Design
              </label>
              <label class="checkbox">
                  <input type="checkbox" value="java" name="tags[]" id="inlineCheckbox3"> Java
              </label>
          </div>
        </div>
        <div class="col-md-3">
          <div class="controls span2">
              <label class="checkbox">
                  <input type="checkbox" value="python" name="tags[]" id="inlineCheckbox1"> Python & Django
              </label>
              <label class="checkbox">
                  <input type="checkbox" value="ruby" name="tags[]" id="inlineCheckbox2"> Ruby on Rails
              </label>
              <label class="checkbox">
                  <input type="checkbox" value="php" name="tags[]" id="inlineCheckbox3"> PHP
              </label>
              <label class="checkbox">
                  <input type="checkbox" value="opsys" name="tags[]" id="inlineCheckbox3"> Operating Systems
              </label>
          </div>
        </div>
        <div class="col-md-3">
          <div class="controls span2">
              <label class="checkbox">
                  <input type="checkbox" value=".net" name="tags[]" id="inlineCheckbox1"> .NET Framework
              </label>
              <label class="checkbox">
                  <input type="checkbox" value="clangs" name="tags[]" id="inlineCheckbox2"> C, C++, C#
              </label>
              <label class="checkbox">
                  <input type="checkbox" value="htmlcss" name="tags[]" id="inlineCheckbox3"> HTML & CSS
              </label>
              <label class="checkbox">
                  <input type="checkbox" value="other" name="tags[]" id="inlineCheckbox3"> Other
              </label>
          </div>
        </div>
      </div>
      <input class="btn btn-default" type="submit" value="Start Creating.">
    </form>
  </div>
</div>
</div>

<style>
.drag-and-drop {
  height: 200px;
  width: 200px;
  background-color: #333;
}
</style>
