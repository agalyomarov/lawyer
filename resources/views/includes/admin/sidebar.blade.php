  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <div class="sidebar">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">Alexander Pierce</a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-item">
                      <a href="{{ route('home') }}" class="nav-link">
                          <i class="nav-icon fa fa-home"></i>
                          <p>
                              Главная
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.service.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-undo"></i>
                          <p>
                              Услуги
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.speciality.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-user-tag"></i>
                          <p>
                              Специальности
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.personal.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-users"></i>
                          <p>
                              Сотрудники
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.entry.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-calendar-check"></i>
                          <p>
                              Онлайн записи
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.link.index') }}" class="nav-link">
                          <i class="nav-icon fa fa-link"></i>
                          <p>
                              Ссылки
                              <span class="right badge badge-danger tag_for_count hidden"></span>
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.variable.index') }}" class="nav-link">
                          <i class="nav-icon fa fa-share"></i>
                          <p>
                              Период уведомлении
                              <span class="right badge badge-danger tag_for_count hidden"></span>
                          </p>
                      </a>
                  </li>
              </ul>
          </nav>
      </div>
  </aside>
  <script>
      fetch('/admin/link/get_count')
          .then(res => {
              return res.json();
          }).then(data => {
              //   console.log(data);
              if (data.count < 30) {
                  document.querySelector('.tag_for_count').textContent = data.count;
                  document.querySelector('.tag_for_count').classList.remove('hidden');
              }
          })
  </script>
