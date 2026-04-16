<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <title>Cập nhật</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Laravel Nhóm H</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <!-- Phùng Đình Hạnh -->
          @auth
            <li class="nav-item">
              <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-link nav-link"
                  style="display: inline; padding: 0; border: none; background: none;">Đăng xuất</button>
              </form>
            </li>
          @else
            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Đăng nhập</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Đăng ký</a></li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>

  <main class="container mt-5">
    <h2 class="text-center mb-4">Chi tiết người dùng</h2>

    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-header bg-info text-white text-center">
            <h5>Thông tin User</h5>
          </div>
          <div class="card-body">
            <dl class="row">
              <dt class="col-sm-4">ID</dt>
              <dd class="col-sm-8">{{ $user->id }}</dd>

              <dt class="col-sm-4">Username</dt>
              <dd class="col-sm-8">{{ $user->name }}</dd>

              <dt class="col-sm-4">Email</dt>
              <dd class="col-sm-8">{{ $user->email }}</dd>

              <dt class="col-sm-4">Phone</dt>
              <dd class="col-sm-8">{{ $user->phone }}</dd>

              <dt class="col-sm-4">Address</dt>
              <dd class="col-sm-8">{{ $user->address }}</dd>

              <dt class="col-sm-4">Ngày tạo</dt>
              <dd class="col-sm-8">{{ $user->created_at }}</dd>
            </dl>
            <div class="d-flex justify-content-end mt-3">
              <a href="{{ route('users.index') }}" class="btn btn-secondary me-2">Back</a>

              <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary me-2">Edit</a>

              <form action="{{ route('users.delete', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>



  <footer class="bg-dark text-white text-center p-3 mt-5">
    <small>&copy; Lập trình web Nhóm H</small>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>