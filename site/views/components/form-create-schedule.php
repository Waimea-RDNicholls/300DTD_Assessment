<form hx-post="/create_schedule"
      hx-trigger="submit">




    <label>Day</label>
    <input name="day" type="int" required>

    <label>Start Time</label>
    <input name="start" type="int" required>

    <label>End Time</label>
    <input name="end" type="int" required>


    <input type="submit" value="Create a Schedule!">