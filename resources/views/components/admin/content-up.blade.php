<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $users_count }}</h3>

                <p>Пользователи</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('admin.users') }}" class="small-box-footer">Подробно<i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>
                    {{ $surveys_count }}
                </h3>

                <p>Опросы</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('survey.index') }}" class="small-box-footer">Подробно<i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

</div>
