<?php 
    class QuestionsData 
    {
        public $gender = "Eres";
        public $age = "Cuál es tu rango de edad?";
        public $soundsWakeMeUp = "El más mínimo sonido o luz puede mantenerme despierto o despertarme.";
        public $snoreWhileSleeping = "¿Roncas mientras duermes?";
        public $snoreWhileSleeping_often = "¿Con qué frecuencia roncas?";
        public $snoringType = "Describa sus ronquidos.";
        public $foodPassion = "La comida no es una gran pasión para mí.";
        public $wakeUpBeforeMyAlarmRings = "Normalmente me despierto antes de que suene la alarma.";
        public $sleepOnPlanes = "No puedo dormir bien en los aviones, incluso con una máscara para los ojos y tapones para los oídos.";
        public $irritableDueFatigue = "A menudo estoy irritable debido a la fatiga.";
        public $worriesInSmallDetails = "Me preocupo desmesuradamente por los pequeños detalles.";
        public $insomniacDiagnosis = "He sido diagnosticado por un médico o autodiagnosticado como insomnio";
        public $anxiousAboutMyGrades = "En la escuela, estaba ansioso por mis calificaciones.";
        public $SleepRumiation = "Pierdo el sueño rumiando sobre lo que sucedió en el pasado y lo que podría suceder en el futuro.";
        public $perfectionist = "Soy un perfeccionista.";
        public $wakeUpHourFreeMode = "Si no tuviera nada que hacer al día siguiente y se diera permiso para dormir todo el tiempo que quisiera, ¿cuándo se despertaría?";
        public $alarmClock = "Cuando tienes que levantarte de la cama a una hora determinada, ¿utilizas un despertador?";
        public $wakeUpOnWeekends = "¿Cuándo te despiertas los fines de semana?";
        public $jetLag = "¿Cómo vives el jet lag?";
        public $favoriteMeal = "¿Cuál es su comida favorita? (Piense en la hora del día más que en el menú).";
        public $concentration = "Si volvieras a la escuela secundaria y volvieras a tomar el SAT, ¿cuándo preferirías comenzar la prueba para tener el máximo enfoque y concentración (no solo para terminar de una vez)?";
        public $workout = "Si pudieras elegir cualquier momento del día para hacer un entrenamiento intenso, ¿cuándo lo harías?";
        public $mostAlert = "¿Cuándo estás más alerta?";
        public $fiveHourWorkday = "Si pudiera elegir su propia jornada laboral de cinco horas, ¿qué bloque de horas consecutivas elegiría?";
        public $brainQuestion = "Se considera usted ...";
        public $nap = "¿Duermes la siesta?";
        public $efficiencyAndSaferHours = "Si tuviera que hacer dos horas de trabajo físico duro, como mover muebles o cortar leña, ¿cuándo elegiría hacerlo para obtener la máxima eficiencia y seguridad (no solo para terminar de una vez)?";
        public $betterStatement = "Con respecto a su salud en general, ¿qué afirmación suena como usted?";
        public $riskTakingComfort = "¿Cuál es su nivel de comodidad con la toma de riesgos?";
        public $selfConsider = "Se considera usted:";
        public $studentType = "¿Cómo te caracterizarías como estudiante?";
        public $firstWakeUp = "Cuando te levantas por la mañana, ¿estás ...";
        public $appetiteInMorning = "¿Cómo describiría su apetito dentro de la media hora de despertar?";
        public $insomniaIntensity = "¿Con qué frecuencia sufre de síntomas de insomnio?";
        public $lifeSatisfaction = "¿Cómo describiría su satisfacción general con la vida?";

        //______________________________________________________________________________________________________________________________________

        public $gender_R = array("male", "female", "unlisted");
        public $age_R = array("1", "2", "3");
        public $soundsWakeMeUp_R = array("true", "false"); //bool
        public $snoreWhileSleeping_R = array("true", "false"); //bool
        public $snoreWhileSleeping_often_R = array("Every day", "3-4 times a week", "1-2 times a week", "1-2 times a month"); //only if you snore
            //0: Every day.
            //1: 3-4 times a week.
            //2: 1-2 times a week.
            //3: 1-2 times a month.
        public $snoringType_R = array("louder than breathing", "as loud as talking", "very loud", "Heard in adjacent room"); //only if you snore
            //0: louder than breathing.
            //1: as loud as talking.
            //2: very loud.
            //3: Heard in adjacent room. 
        public $foodPassion_R = array("true", "false"); //bool
        public $wakeUpBeforeMyAlarmRings_R = array("true", "false"); //bool
        public $sleepOnPlanes_R = array("true", "false"); //bool
        public $irritableDueFatigue_R = array("true", "false"); //bool
        public $worriesInSmallDetails_R = array("true", "false"); //bool
        public $insomniacDiagnosis_R = array("true", "false"); //bool
        public $anxiousAboutMyGrades_R = array("true", "false"); //bool
        public $SleepRumiation_R = array("true", "false"); //bool
        public $perfectionist_R = array("true", "false"); //bool
        public $wakeUpHourFreeMode_R = array("Before 6:30", "Between 6:30 a.m. and 8:45 a.m.", "After 8:45 a.m.");
            //0: Before 6:30.
            //1: Between 6:30 a.m. and 8:45 a.m.
            //2: After 8:45 a.m.
        public $alarmClock_R = array("No need. You wake up on your own at just the right time.", "Yes to the alarm, with no or one snoozes.", "Yes to the alarm, with a backup alarm, and multiple snoozes.");
            //0: No need. You wake up on your own at just the right time.
            //1: Yes to the alarm, with no or one snoozes.
            //2: Yes to the alarm, with a backup alarm, and multiple snoozes.
        public $wakeUpOnWeekends_R = array("The same time as your workweek schedule.", "Within forty-five to ninety minutes of your workweek schedule.", "Ninety minutes or more past your workweek schedule.");
            //0: The same time as your workweek schedule.
            //1: Within forty-five to ninety minutes of your workweek schedule.
            //2: Ninety minutes or more past your workweek schedule.
        public $jetLag_R = array("You struggle with it, no matter what.", "You adjust within forty-eight hours.", "You adjust quickly, especially when traveling west.");
            //0: You struggle with it, no matter what.
            //1: You adjust within forty-eight hours.
            //2: You adjust quickly, especially when traveling west.
        public $favoriteMeal_R = array("Breakfast.", "Lunch.", "Dinner.");
            //0: Breakfast.
            //1: Lunch.
            //2: Dinner.
        public $concentration_R = array("Early morning.", "Early afternoon.", "Midafternoon.");
            //0: Early morning.
            //1: Early afternoon.
            //2: Midafternoon.
        public $workout_R = array("Before 8:00 a.m.", "Between 8:00 a.m. and 4:00 p.m.", "After 4:00 p.m.");
            //0: Before 8:00 a.m.
            //1: Between 8:00 a.m. and 4:00 p.m.
            //2: After 4:00 p.m.
        public $mostAlert_R = array("One to two hours post wake-up.", "Two to four hours post wake-up.", "Four to six hours post wake-up.");
            //0: One to two hours post wake-up.
            //1: Two to four hours post wake-up.
            //2: Four to six hours post wake-up.
        public $fiveHourWorkday_R = array("4:00 a.m. to 9:00 a.m.", "9:00 a.m. to 2:00 p.m.", "4:00 p.m. to 9:00 p.m.");
            //0: 4:00 a.m. to 9:00 a.m.
            //1: 9:00 a.m. to 2:00 p.m.
            //2: 4:00 p.m. to 9:00 p.m.
        public $brainQuestion_R = array("Left-brained that is, a strategic and analytical thinker", "A balanced thinker", "Right-brained that is, a creative and insightful thinker");
            //0: Left-brained that is, a strategic and analytical thinker
            //1: A balanced thinker
            //2: Right-brained that is, a creative and insightful thinker
        public $nap_R = array("Never.", "Sometimes on the weekend.", "If you took a nap, you'd be up all night.");
            //0: Never.
            //1: Sometimes on the weekend.
            //2: If you took a nap, you'd be up all night.
        public $efficiencyAndSaferHours_R = array("8:00 a.m. to 10:00 a.m.", "11:00 a.m. to 1:00 p.m.", "6:00 p.m. to 8:00 p.m.");
            //0: 8:00 a.m. to 10:00 a.m.
            //1: 11:00 a.m. to 1:00 p.m.
            //2: 6:00 p.m. to 8:00 p.m.
        public $betterStatement_R = array("I make healthy choices almost all of the time.", "I make healthy choices sometimes.", "I struggle to make healthy choices.");
            //0: I make healthy choices almost all of the time.
            //1: I make healthy choices sometimes.
            //2: I struggle to make healthy choices.
        public $riskTakingComfort_R = array("Low.", "Medium.", "High.");
            //0: Low.
            //1: Medium.
            //2: High.
        public $selfConsider_R = array("Future-oriented with big plans and clear goals.", "Informed by the past, hopeful about the future, and aspiring to live in the moment.", "Present-oriented. It's all about what feels good now.");
            //0: Future-oriented with big plans and clear goals.
            //1: Informed by the past, hopeful about the future, and aspiring to live in the moment.
            //2: Present-oriented. It's all about what feels good now.
        public $studentType_R = array("Stellar.", "Solid.", "Slacker.");
            //0: Stellar.
            //1: Solid.
            //2: Slacker.
        public $firstWakeUp_R = array("Bright-eyed.", "Dazed but not confused.", "Groggy, eyelids made of cement.");
            //0: Bright-eyed.
            //1: Dazed but not confused.
            //2: Groggy, eyelids made of cement.
        public $appetiteInMorning_R = array("Very hungry.", "Hungry.", "Not at all hungry.");
            //0: Very hungry.
            //1: Hungry.
            //2: Not at all hungry.
        public $insomniaIntensity_R = array("Rarely, only when adjusting to a new time zone.", "Occasionally, when going through a rough time or are stressed out.", "Chronically. It comes in waves.");
            //0: Rarely, only when adjusting to a new time zone.
            //1: Occasionally, when going through a rough time or are stressed out.
            //2: Chronically. It comes in waves.
        public $lifeSatisfaction_R = array("High.", "Good.", "Low.");
            //0: High.
            //1: Good.
            //2: Low.

    }
?>