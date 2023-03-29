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

        public $gender_R = array("Hombre", "Mujer", "Prefiero no responder");
        public $age_R = array("Menor de 20", "20-30", "31-35", "36-40", "41-50", "51-60", "61-70", "+70");
        public $soundsWakeMeUp_R = array("Si", "No"); //bool
        public $snoreWhileSleeping_R = array("Si", "No"); //bool
        public $snoreWhileSleeping_often_R = array("Cada dia", "3-4 veces a la semana", "1-2 veces a la semana", "1-2 veces al mes"); //only if you snore
            //0: Every day.
            //1: 3-4 times a week.
            //2: 1-2 times a week.
            //3: 1-2 times a month.
        public $snoringType_R = array("más fuerte que respirar", "tan fuerte como hablar", "muy fuerte", "Se puede escuchar en otra habitación"); //only if you snore
            //0: louder than breathing.
            //1: as loud as talking.
            //2: very loud.
            //3: Heard in adjacent room. 
        public $foodPassion_R = array("Si", "No"); //bool
        public $wakeUpBeforeMyAlarmRings_R = array("Si", "No"); //bool
        public $sleepOnPlanes_R = array("Si", "No"); //bool
        public $irritableDueFatigue_R = array("Si", "No"); //bool
        public $worriesInSmallDetails_R = array("Si", "No"); //bool
        public $insomniacDiagnosis_R = array("Si", "No"); //bool
        public $anxiousAboutMyGrades_R = array("Si", "No"); //bool
        public $SleepRumiation_R = array("Si", "No"); //bool
        public $perfectionist_R = array("Si", "No"); //bool
        public $wakeUpHourFreeMode_R = array("Antes de las 6:30", "Entre las 6:30 a.m. y 8:45 a.m.", "Después 8:45 a.m.");
            //0: Before 6:30.
            //1: Between 6:30 a.m. and 8:45 a.m.
            //2: After 8:45 a.m.
        public $alarmClock_R = array("No hay necesidad. Te despiertas solo en el momento justo.", "Sí a la alarma, sin ninguna o alguna cabezada.", "Sí a la alarma, con una segunda alarma, y multiples cabezadas.");
            //0: No need. You wake up on your own at just the right time.
            //1: Yes to the alarm, with no or one snoozes.
            //2: Yes to the alarm, with a backup alarm, and multiple snoozes.
        public $wakeUpOnWeekends_R = array("Al mismo tiempo que su horario de semana laboral.", "Dentro de cuarenta y cinco a noventa minutos de su horario de semana laboral.", "Noventa minutos o más después de su horario de semana laboral.");
            //0: The same time as your workweek schedule.
            //1: Within forty-five to ninety minutes of your workweek schedule.
            //2: Ninety minutes or more past your workweek schedule.
        public $jetLag_R = array("Luchas con eso, pase lo que pase.", "Te ajustas en cuarenta y ocho horas.", "Te adaptas rápidamente, especialmente cuando viajas al oeste.");
            //0: You struggle with it, no matter what.
            //1: You adjust within forty-eight hours.
            //2: You adjust quickly, especially when traveling west.
        public $favoriteMeal_R = array("Desayuno.", "Almuerzo.", "Cena.");
            //0: Breakfast.
            //1: Lunch.
            //2: Dinner.
        public $concentration_R = array("Temprano en la mañana.", "Temprano en la tarde.", "Media tarde.");
            //0: Early morning.
            //1: Early afternoon.
            //2: Midafternoon.
        public $workout_R = array("Antes de 8:00 a.m.", "Entre 8:00 a.m. y 4:00 p.m.", "Después de 4:00 p.m.");
            //0: Before 8:00 a.m.
            //1: Between 8:00 a.m. and 4:00 p.m.
            //2: After 4:00 p.m.
        public $mostAlert_R = array("Una o dos horas después del despertar.", "De dos a cuatro horas después del despertar.", "De cuatro a seis horas después del despertar.");
            //0: One to two hours post wake-up.
            //1: Two to four hours post wake-up.
            //2: Four to six hours post wake-up.
        public $fiveHourWorkday_R = array("4:00 a.m. a 9:00 a.m.", "9:00 a.m. a 2:00 p.m.", "4:00 p.m. a 9:00 p.m.");
            //0: 4:00 a.m. to 9:00 a.m.
            //1: 9:00 a.m. to 2:00 p.m.
            //2: 4:00 p.m. to 9:00 p.m.
        public $brainQuestion_R = array("Cerebro izquierdo, es decir, un pensador estratégico y analítico.", "Un pensador equilibrado", "Cerebro derecho, es decir, un pensador creativo y perspicaz.");
            //0: Left-brained that is, a strategic and analytical thinker
            //1: A balanced thinker
            //2: Right-brained that is, a creative and insightful thinker
        public $nap_R = array("Nunca.", "A veces el fin de semana.", "Si tomaras una siesta, estarías despierto toda la noche.");
            //0: Never.
            //1: Sometimes on the weekend.
            //2: If you took a nap, you'd be up all night.
        public $efficiencyAndSaferHours_R = array("8:00 a.m. a 10:00 a.m.", "11:00 a.m. a 1:00 p.m.", "6:00 p.m. a 8:00 p.m.");
            //0: 8:00 a.m. to 10:00 a.m.
            //1: 11:00 a.m. to 1:00 p.m.
            //2: 6:00 p.m. to 8:00 p.m.
        public $betterStatement_R = array("Tomo decisiones saludables casi todo el tiempo.", "Tomo decisiones saludables a veces.", "Me cuesta tomar decisiones saludables.");
            //0: I make healthy choices almost all of the time.
            //1: I make healthy choices sometimes.
            //2: I struggle to make healthy choices.
        public $riskTakingComfort_R = array("Bajo.", "Medio.", "Alto.");
            //0: Low.
            //1: Medium.
            //2: High.
        public $selfConsider_R = array("Orientado al futuro con grandes planes y metas claras.", "Informado por el pasado, esperanzado con el futuro y aspirando a vivir el momento.", "Orientado al presente. Se trata de lo que se siente bien ahora.");
            //0: Future-oriented with big plans and clear goals.
            //1: Informed by the past, hopeful about the future, and aspiring to live in the moment.
            //2: Present-oriented. It's all about what feels good now.
        public $studentType_R = array("Estelar.", "Sólido.", "Vago.");
            //0: Stellar.
            //1: Solid.
            //2: Slacker.
        public $firstWakeUp_R = array("ojos brillantes.", "Aturdido pero no confundido", "Aturdido, párpados hechos de cemento.");
            //0: Bright-eyed.
            //1: Dazed but not confused.
            //2: Groggy, eyelids made of cement.
        public $appetiteInMorning_R = array("Muy hambriento.", "Hambriento.", "No deltodo hambriento.");
            //0: Very hungry.
            //1: Hungry.
            //2: Not at all hungry.
        public $insomniaIntensity_R = array("En raras ocasiones, solo cuando se ajusta a una nueva zona horaria.", "De vez en cuando, cuando está pasando por un mal momento o está estresado.", "Crónicamente. Viene en oleadas.");
            //0: Rarely, only when adjusting to a new time zone.
            //1: Occasionally, when going through a rough time or are stressed out.
            //2: Chronically. It comes in waves.
        public $lifeSatisfaction_R = array("Alto.", "Bien.", "Bajo.");
            //0: High.
            //1: Good.
            //2: Low.

    }
?>