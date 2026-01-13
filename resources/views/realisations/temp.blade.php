<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planning des Réservations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #333;
            color: white;
        }

        .occupied {
            background-color: red;
            color: white;
            font-weight: bold;
        }

        .current-day {
            background-color: yellow;
            color: black;
        }
    </style>
</head>
<body>

    <h1>Planning des Réservations</h1>

    <!-- Vérification des données passées -->
    <pre>{{ print_r($schedule, true) }}</pre>

    <table>
        <thead>
            <tr>
                <th>Heure</th>
                <th>Lundi</th>
                <th>Mardi</th>
                <th>Mercredi</th>
                <th>Jeudi</th>
                <th>Vendredi</th>
            </tr>
        </thead>
        <tbody>
            @foreach(range(00, 23) as $hour)
                @foreach(['00','15','30','45'] as $minute)
                    @php
                        $time = sprintf("%02d:%s", $hour, $minute);
                    @endphp
                    <tr>
                        <td>{{ $time }}</td>
                        @foreach(['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi'] as $day)
                            <td data-day="{{ $day }}" data-time="{{ $time }}">
                                Libre
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

    <script>
        // 🔹 Convertir les données Laravel en JavaScript
const schedule = @json($schedule);
const currentDay = '{{ $currentDay }}';

// Fonction pour convertir le temps en minutes
function timeInMinutes(time) {
    if (!time || !time.includes(':')) return 0;
    const [hours, minutes] = time.split(':').map(Number);
    return hours * 60 + minutes;
}

window.onload = function() {
    const cells = document.querySelectorAll("td[data-day][data-time]");

    cells.forEach(cell => {
        const day = cell.getAttribute("data-day");
        const time = cell.getAttribute("data-time");
        const cellTime = timeInMinutes(time); // Convertir l'heure de la cellule en minutes

        // Vérifier si le jour existe dans le planning
        if (schedule[day]) {
            schedule[day].forEach(slot => {
                const startTime = timeInMinutes(slot.start); // Convertir le startTime en minutes
                const endTime = timeInMinutes(slot.end); // Convertir le endTime en minutes

                // Afficher les comparaisons dans la console pour déboguer
                console.log(`Comparaison: cellTime=${cellTime} vs startTime=${startTime} - endTime=${endTime}`);

                // Si l'heure de la cellule tombe dans l'intervalle de réservation, marquer comme occupé
                // تحويل القيم إلى أرقام للتأكد من صحتها
        let cellTimeNum = Number(cellTime);
        let startTimeNum = Number(startTime);
        let endTimeNum = Number(endTime);

        // التحقق من القيم قبل المقارنة
        if (!isNaN(cellTimeNum) && !isNaN(startTimeNum) && !isNaN(endTimeNum)) {
            if (cellTimeNum >= startTimeNum && cellTimeNum < endTimeNum) {
                console.log(`🔴 Occupé: ${cellTimeNum} entre ${startTimeNum} et ${endTimeNum}`);
                cell.classList.add("occupied");
                cell.innerText = "Occupé"; // لا داعي لـ innerHTML
            } else {
                console.log(`🟢 Libre: ${cellTimeNum} en dehors de ${startTimeNum} - ${endTimeNum}`);
                cell.classList.remove("occupied");
            }
        } else {
            console.error("⚠️ Erreur: Les valeurs ne sont pas valides", { cellTime, startTime, endTime });
        }

                    });
                }

        // Ajouter une classe pour le jour actuel
        if (day === currentDay) {
            cell.classList.add("current-day");
        }
    });
};

    </script>

</body>
</html>
