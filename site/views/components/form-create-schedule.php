<form hx-post="/create_schedule"
      hx-trigger="submit"
      hx-swap="innerHTML">




    <label>Day</label>
    <select name="day" type="int" required>
    <option value="Monday">Monday</option>
    <option value="Tuesday">Tuesday</option>
    <option value="Wednesday">Wednesday</option>
    <option value="Thursday">Thursday</option>
    <option value="Friday">Friday</option>
    <option value="Saturday">Saturday</option>
    <option value="Sunday">Sunday</option>
    </select>

    <label>Start Time</label>
    <input name="start" type="int" min="0" max="24" required>

    <label>End Time</label>
    <input name="end" type="int" min="0" max="24" required>

    <input type="submit" value="Create a Schedule!">