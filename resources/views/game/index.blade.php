<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container pt-4">
        <form id="form-game">
            <div>
                <label for="stadium" class="form-label">Stadium</label>
                <input type="text" id="stadium" name="stadium" class="form-control" placeholder="Stadium" required>
            </div>

            <div class="row mt-3">
                <div class="col-6">
                    <label for="team1" class="form-label">Team 1</label>
                    <input type="text" id="team1" name="team1" class="form-control" placeholder="Stadium" required>
                </div>

                <div class="col-6">
                    <label for="team2" class="form-label">Team 2</label>
                    <input type="text" id="team2" name="team2" class="form-control" placeholder="Stadium" required>
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    
        <table id="table-data-game" class="table mt-5 table-striped">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Stadium</th>
                    <th>Team1</th>
                    <th>Team2</th>
                </tr>
            </thead>
    
            <tbody></tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function fetchGameData() {
            const $table = $('#table-data-game tbody')

            $table.html('')

            $.ajax({
                url: "{{ route('game.index') }}",
                data: {all: 1},
                success: function (res) {
                    const {data} = res

                    for (const game of data) {
                        $table.append(`
                            <tr>
                                <td>${game.mdate}</td>    
                                <td>${game.stadium}</td>    
                                <td>${game.team1}</td>    
                                <td>${game.team2}</td>    
                            </tr>
                        `)
                    }
                }
            })
        }

        $(document).on('submit', '#form-game', function (e) {
            e.preventDefault()

            const $form = $(this)
            const data = $form.serialize()

            $.ajax({
                url: "{{ route('game.store') }}",
                type: 'POST',
                data,
                success: function () {
                    alert('Success menambah data')

                    fetchGameData()
                },
                error: function () {
                    alert('Gagal menambah data')
                }
            })
        })

        fetchGameData()
    </script>
</body>
</html>