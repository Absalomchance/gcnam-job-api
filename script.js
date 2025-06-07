document.getElementById('rateForm').addEventListener('submit', async function (e) {
  e.preventDefault();

  const form = new FormData(e.target);

  // Extract and validate form data
  const unit = form.get('unit')?.trim();
  const arrival = form.get('arrival')?.trim();
  const departure = form.get('departure')?.trim();
  const occupants = parseInt(form.get('occupants'), 10);
  const agesInput = form.get('ages')?.trim();

  const resultDiv = document.getElementById('result');

  // Basic validation
  if (!unit || !arrival || !departure || isNaN(occupants) || !agesInput) {
    resultDiv.innerHTML = `<div class="rate-card unavailable"><p>Please fill in all fields correctly.</p></div>`;
    return;
  }

  // Convert and validate age input
  const ages = agesInput.split(',').map(age => parseInt(age.trim(), 10));
  if (ages.some(isNaN)) {
    resultDiv.innerHTML = `<div class="rate-card unavailable"><p>Please enter valid ages separated by commas (e.g., 5,10,35).</p></div>`;
    return;
  }

  const payload = { unit, arrival, departure, occupants, ages };

  try {
    // Show loading UI
    resultDiv.innerHTML = `<div class="rate-card"><p>Loading rates...</p></div>`;

    // Make request to PHP API (not Node.js)
    const response = await fetch('rates-api.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(payload)
    });

    if (!response.ok) {
      throw new Error(`Server responded with status ${response.status}`);
    }

    const result = await response.json();

    // Extract rate information safely
    const rateInfo = result.Legs?.[0] || null;

    resultDiv.innerHTML = `
      <div class="rate-card ${rateInfo ? '' : 'unavailable'}">
        <h2>Rate Details</h2>
        <p><strong>Unit:</strong> ${rateInfo?.Category || 'N/A'}</p>
        <p><strong>Daily Rate:</strong> ${rateInfo ? 'N$ ' + rateInfo['Effective Average Daily Rate'] : 'N/A'}</p>
        <p><strong>Total Rate:</strong> ${result['Total Charge'] ? 'N$ ' + result['Total Charge'] : 'N/A'}</p>
        <p><strong>Date Range:</strong> ${arrival} to ${departure}</p>
        <p><strong>Available:</strong> ${rateInfo ? 'Yes' : 'No'}</p>
      </div>
    `;
  } catch (error) {
    console.error('Error fetching rates:', error);
    resultDiv.innerHTML = `
      <div class="rate-card unavailable">
        <p style="color:red;">Error fetching rates. Please try again later.</p>
      </div>
    `;
  }
});
