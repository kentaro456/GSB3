<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialisez FullCalendar
        var calendar = $('#calendar').fullCalendar({
            // Configuration de FullCalendar (vous pouvez personnaliser selon vos besoins)
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultView: 'month',
            events: []
        });

        // Gérez le clic sur une présentation
        $('.presentation-item').on('click', function () {
            var presentationId = $(this).data('presentation-id');
            
            // Récupérez les créneaux horaires associés à la présentation (à remplacer par votre logique)
            var timeSlots = [
                { title: 'Créneau 1', start: '2024-02-01T09:00:00', end: '2024-02-01T10:00:00' },
                { title: 'Créneau 2', start: '2024-02-01T10:30:00', end: '2024-02-01T11:30:00' },
                // ... Ajoutez d'autres créneaux horaires ici
            ];

            // Ajoutez les événements au calendrier
            calendar.fullCalendar('removeEvents');
            calendar.fullCalendar('addEventSource', timeSlots);
            calendar.fullCalendar('refetchEvents');

            // Affichez le calendrier (à personnaliser selon votre interface)
            $('#calendar-modal').modal('show');
            
            // Forcez le calendrier à se redimensionner pour résoudre le problème d'affichage
            calendar.fullCalendar('render');
        });
    });
</script>