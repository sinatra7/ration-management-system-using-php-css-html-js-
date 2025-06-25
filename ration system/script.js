document.addEventListener("DOMContentLoaded", function() {
    const addFamilyMemberButton = document.getElementById("add-family-member");
    const familyMembersContainer = document.getElementById("family-members-container");

    let memberCount = 1; // Initial family member count

    addFamilyMemberButton.addEventListener("click", function() {
        memberCount++; // Increment member count
        const newMemberDiv = document.createElement("div");
        newMemberDiv.classList.add("family-member");
        newMemberDiv.innerHTML = `
            <input type="text" name="member-name[]" placeholder="Name" required>
            <select name="member-relationship[]">
                <option value="Brother">Brother</option>
                <option value="Sister">Sister</option>
                <option value="Mother">Mother</option>
                <option value="Father">Father</option>
                <!-- Add more options for other relationships as needed -->
            </select>
            <button class="remove-member" type="button">Remove</button>
        `;
        familyMembersContainer.appendChild(newMemberDiv);

        // Add event listener to the remove button of the newly added family member
        const removeMemberButton = newMemberDiv.querySelector(".remove-member");
        removeMemberButton.addEventListener("click", function() {
            familyMembersContainer.removeChild(newMemberDiv); // Remove the family member div
            memberCount--; // Decrement member count
        });
    });
});