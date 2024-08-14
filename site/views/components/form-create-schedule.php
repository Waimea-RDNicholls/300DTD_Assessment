<form autocomplete="off"
      hx-post="/create_schedule"
      hx-trigger="submit"
      hx-swap="innerHTML">




    <label>Day</label>
    <select name="day" type="text" required>
    <option value="Monday">Monday</option>
    <option value="Tuesday">Tuesday</option>
    <option value="Wednesday">Wednesday</option>
    <option value="Thursday">Thursday</option>
    <option value="Friday">Friday</option>
    <option value="Saturday">Saturday</option>
    <option value="Sunday">Sunday</option>
    </select>
<p>*These options use 24 hour time (0-11 is A.M, 12-23 is P.M, 24 is A.M.)
    <label>Start Time</label>
    <input name="start" type="number" min="0" max="24" required>

    <label>End Time</label>
    <input name="end" type="number" min="0" max="24" required>

    <input type="submit" value="Create a Schedule!">