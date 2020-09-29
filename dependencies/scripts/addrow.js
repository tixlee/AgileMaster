function addRows(section) {
    if (section == "education") {
        var rowCount = document.getElementById("education-count").value;
        var tbl = document.getElementById("tbl-education");

        var row = tbl.insertRow(-1);
        row.id = "education-row-" + rowCount;
        row.setAttribute("class", "tbl-row");

        var col1 = row.insertCell(0);
        var input1 = document.createElement("select");
        var nameInput1 = "education[]";
        input1.id = nameInput1;
        input1.setAttribute("name", nameInput1);
        input1.setAttribute("class", "qualification-select-input-1");

        var defaultOption = document.createElement("option");
        defaultOption.value = "";
        defaultOption.text = "Education";
        defaultOption.selected = true;
        defaultOption.setAttribute('disabled', '');
        input1.appendChild(defaultOption);
        
        var array = ["Pentaksiran Tingkatan 3 (PT3)", "Sijil Peperiksaan Malaysia (SPM)", "Sijil Tinggi Peperiksaan Malaysia (STPM)"];        
        for (var i = 0; i < array.length; i++) {
            var option = document.createElement("option");
            option.value = array[i];
            option.text = array[i];
            input1.appendChild(option);
        }

        col1.appendChild(input1);

        var col2 = row.insertCell(1);
        var input2 = document.createElement("input");
        var nameInput2 = "education-institute[]";
        input2.setAttribute("type", "text");
        input2.id = nameInput2;
        input2.setAttribute("name", nameInput2);
        input2.setAttribute("class", "text-input-1");
        input2.setAttribute("placeholder", "Institute");
        input2.setAttribute("autocomplete", "off");
        col2.appendChild(input2);

        var col3 = row.insertCell(2);
        var input3 = document.createElement("input");
        var nameInput3 = "education-from[]";
        input3.setAttribute("type", "text");
        input3.id = nameInput3;
        input3.setAttribute("name", nameInput3);
        input3.setAttribute("class", "text-input-2");
        input3.setAttribute("placeholder", "From (Month/Year)");
        input3.setAttribute("autocomplete", "off");
        col3.appendChild(input3);

        var col4 = row.insertCell(3);
        var input4 = document.createElement("input");
        var nameInput4 = "education-to[]";
        input4.setAttribute("type", "text");
        input4.id = nameInput4;
        input4.setAttribute("name", nameInput4);
        input4.setAttribute("class", "text-input-2");
        input4.setAttribute("placeholder", "To (Month/Year)");
        input4.setAttribute("autocomplete", "off");
        col4.appendChild(input4);

        var col5 = row.insertCell(4);
        var input5 = document.createElement("input");
        input5.setAttribute("type", "button");
        input5.id = "tbl-education-del-" + rowCount;
        var deleteFunction = "deleteRow('education', '" + rowCount + "')";
        input5.setAttribute("onclick", deleteFunction);
        input5.setAttribute("value", "X");
        col5.appendChild(input5);

        rowCount++;
        document.getElementById("education-count").value = rowCount;
        var rowChecker = document.getElementById("education-row-count").value;
        rowChecker++;
        document.getElementById("education-row-count").value = rowChecker;
    } else if (section == "higher-ed") {
        var rowCount = document.getElementById("higher-ed-count").value;
        var tbl = document.getElementById("tbl-higher-ed");

        var row = tbl.insertRow(-1);
        row.id = "higher-ed-row-" + rowCount;
        row.setAttribute("class", "tbl-row");

        var col1 = row.insertCell(0);
        var input1 = document.createElement("select");
        var nameInput1 = "higher-ed-lvl[]";
        input1.id = nameInput1;
        input1.setAttribute("name", nameInput1);
        input1.setAttribute("class", "qualification-select-input-2");

        var defaultOption = document.createElement("option");
        defaultOption.value = "";
        defaultOption.text = "Higher Education Level";
        defaultOption.selected = true;
        defaultOption.setAttribute('disabled', '');
        input1.appendChild(defaultOption);
        
        var array = ["Tertiary Education", "Certificate", "Diploma", "Advanced Diploma", "Degree", "Master", "Doctorate"];        
        for (var i = 0; i < array.length; i++) {
            var option = document.createElement("option");
            option.value = array[i];
            option.text = array[i];
            input1.appendChild(option);
        }

        col1.appendChild(input1);

        var col2 = row.insertCell(1);
        var input2 = document.createElement("input");
        var nameInput2 = "higher-ed-institute[]";
        input2.setAttribute("type", "text");
        input2.id = nameInput2;
        input2.setAttribute("name", nameInput2);
        input2.setAttribute("class", "text-input-3");
        input2.setAttribute("placeholder", "Institute");
        input2.setAttribute("autocomplete", "off");
        col2.appendChild(input2);

        var col3 = row.insertCell(2);
        var input3 = document.createElement("input");
        var nameInput3 = "higher-ed-course[]";
        input3.setAttribute("type", "text");
        input3.id = nameInput3;
        input3.setAttribute("name", nameInput3);
        input3.setAttribute("class", "text-input-2");
        input3.setAttribute("placeholder", "Course");
        input3.setAttribute("autocomplete", "off");
        col3.appendChild(input3);

        var col4 = row.insertCell(3);
        var input4 = document.createElement("input");
        var nameInput4 = "higher-ed-year[]";
        input4.setAttribute("type", "text");
        input4.id = nameInput4;
        input4.setAttribute("name", nameInput4);
        input4.setAttribute("class", "text-input-2");
        input4.setAttribute("placeholder", "Year (From - To)");
        input4.setAttribute("autocomplete", "off");
        col4.appendChild(input4);

        var col5 = row.insertCell(4);
        var input5 = document.createElement("input");
        var nameInput5 = "higher-ed-result[]";
        input5.setAttribute("type", "text");
        input5.id = nameInput5;
        input5.setAttribute("name", nameInput5);
        input5.setAttribute("class", "text-input-3");
        input5.setAttribute("placeholder", "Results");
        input5.setAttribute("autocomplete", "off");
        col5.appendChild(input5);

        var col6 = row.insertCell(5);
        var input6 = document.createElement("input");
        input6.setAttribute("type", "button");
        input6.id = "tbl-higher-ed-del-" + rowCount;
        var deleteFunction = "deleteRow('higher-ed', '" + rowCount + "')";
        input6.setAttribute("onclick", deleteFunction);
        input6.setAttribute("value", "X");
        col6.appendChild(input6);

        rowCount++;
        document.getElementById("higher-ed-count").value = rowCount;
        var rowChecker = document.getElementById("higher-ed-row-count").value;
        rowChecker++;
        document.getElementById("higher-ed-row-count").value = rowChecker;
    } else if (section == "work-exp") {
        var rowCount = document.getElementById("work-exp-count").value;
        var tbl = document.getElementById("tbl-work-exp");

        var row1 = tbl.insertRow(-1);
        row1.id = "work-exp-row1-" + rowCount;
        row1.setAttribute("class", "tbl-row");

        var col1 = row1.insertCell(0);
        var input1 = document.createElement("input");
        var nameInput1 = "work-exp-year[]";
        input1.setAttribute("type", "text");
        input1.id = nameInput1;
        input1.setAttribute("name", nameInput2);
        input1.setAttribute("class", "text-input-5");
        input1.setAttribute("placeholder", "Year (From/To)");
        input1.setAttribute("autocomplete", "off");
        col1.appendChild(input1);

        var col2 = row1.insertCell(1);
        var input2 = document.createElement("input");
        var nameInput2 = "work-exp-company[]";
        input2.setAttribute("type", "text");
        input2.id = nameInput2;
        input2.setAttribute("name", nameInput2);
        input2.setAttribute("class", "text-input-5");
        input2.setAttribute("placeholder", "Company");
        input2.setAttribute("autocomplete", "off");
        col2.appendChild(input2);

        var col3 = row1.insertCell(2);
        var input3 = document.createElement("input");
        var nameInput3 = "work-exp-position[]";
        input3.setAttribute("type", "text");
        input3.id = nameInput3;
        input3.setAttribute("name", nameInput3);
        input3.setAttribute("class", "text-input-5");
        input3.setAttribute("placeholder", "Position");
        input3.setAttribute("autocomplete", "off");
        col3.appendChild(input3);

        var col4 = row1.insertCell(3);
        var input4 = document.createElement("input");
        var nameInput4 = "work-exp-salary[]";
        input4.setAttribute("type", "text");
        input4.id = nameInput4;
        input4.setAttribute("name", nameInput4);
        input4.setAttribute("class", "text-input-5");
        input4.setAttribute("placeholder", "Salary (RM)");
        input4.setAttribute("autocomplete", "off");
        col4.appendChild(input4);

        var col5 = row1.insertCell(4);
        col5.setAttribute("rowspan", "2");
        var input5 = document.createElement("input");
        input5.setAttribute("type", "button");
        input5.id = "tbl-work-exp-del-" + rowCount;
        var deleteFunction = "deleteRow('work-exp', '" + rowCount + "')";
        input5.setAttribute("onclick", deleteFunction);
        input5.setAttribute("value", "X");
        col5.appendChild(input5);

        var row2 = tbl.insertRow(-1);
        row2.id = "work-exp-row2-" + rowCount;
        row2.setAttribute("class", "tbl-row");

        var col6 = row2.insertCell(0);
        col6.setAttribute("colspan", "2");
        var input6 = document.createElement("textarea");
        var nameInput6 = "work-exp-job-desc[]";
        input6.setAttribute("type", "text");
        input6.id = nameInput6;
        input6.setAttribute("name", nameInput6);
        input6.setAttribute("class", "text-input-4");
        input6.setAttribute("placeholder", "Job Description");
        input6.setAttribute("autocomplete", "off");
        col6.appendChild(input6);

        var col7 = row2.insertCell(1);
        col7.setAttribute("colspan", "2");
        var input7 = document.createElement("textarea");
        var nameInput7 = "work-exp-reason[]";
        input7.setAttribute("type", "text");
        input7.id = nameInput7;
        input7.setAttribute("name", nameInput7);
        input7.setAttribute("class", "text-input-4");
        input7.setAttribute("placeholder", "Reason of Leaving");
        input7.setAttribute("autocomplete", "off");
        col7.appendChild(input7);

        rowCount++;
        document.getElementById("work-exp-count").value = rowCount;
        var rowChecker = document.getElementById("work-exp-row-count").value;
        rowChecker++;
        document.getElementById("work-exp-row-count").value = rowChecker;
    } else if (section == "ref") {
        var rowCount = document.getElementById("ref-count").value;
        var tbl = document.getElementById("tbl-ref");

        var row1 = tbl.insertRow(-1);
        row1.id = "ref-row1-" + rowCount;
        row1.setAttribute("class", "tbl-row");

        var col1 = row1.insertCell(0);
        col1.setAttribute("colspan", "2");
        var input1 = document.createElement("input");
        var nameInput1 = "ref-name[]";
        input1.setAttribute("type", "text");
        input1.id = nameInput1;
        input1.setAttribute("name", nameInput2);
        input1.setAttribute("class", "text-input-6");
        input1.setAttribute("placeholder", "Name");
        input1.setAttribute("autocomplete", "off");
        col1.appendChild(input1);

        var col2 = row1.insertCell(1);
        col2.setAttribute("colspan", "2");
        var input2 = document.createElement("input");
        var nameInput2 = "ref-relationship[]";
        input2.setAttribute("type", "text");
        input2.id = nameInput2;
        input2.setAttribute("name", nameInput2);
        input2.setAttribute("class", "text-input-6");
        input2.setAttribute("placeholder", "Relationship");
        input2.setAttribute("autocomplete", "off");
        col2.appendChild(input2);

        var col3 = row1.insertCell(2);
        col3.setAttribute("colspan", "2");
        var input3 = document.createElement("input");
        var nameInput3 = "ref-phone[]";
        input3.setAttribute("type", "text");
        input3.id = nameInput3;
        input3.setAttribute("name", nameInput3);
        input3.setAttribute("class", "text-input-6");
        input3.setAttribute("placeholder", "Phone No.");
        input3.setAttribute("autocomplete", "off");
        col3.appendChild(input3);

        var col4 = row1.insertCell(3);
        col4.setAttribute("rowspan", "2");
        var input4 = document.createElement("input");
        input4.setAttribute("type", "button");
        input4.id = "tbl-ref-del-" + rowCount;
        var deleteFunction = "deleteRow('ref', '" + rowCount + "')";
        input4.setAttribute("onclick", deleteFunction);
        input4.setAttribute("value", "X");
        col4.appendChild(input4);

        var row2 = tbl.insertRow(-1);
        row2.id = "ref-row2-" + rowCount;
        row2.setAttribute("class", "tbl-row");

        var col5 = row2.insertCell(0);
        col5.setAttribute("colspan", "3");
        var input5 = document.createElement("input");
        var nameInput5 = "ref-place[]";
        input5.setAttribute("type", "text");
        input5.id = nameInput5;
        input5.setAttribute("name", nameInput5);
        input5.setAttribute("class", "text-input-7");
        input5.setAttribute("placeholder", "College/University/Company");
        input5.setAttribute("autocomplete", "off");
        col5.appendChild(input5);

        var col6 = row2.insertCell(1);
        col6.setAttribute("colspan", "3");
        var input6 = document.createElement("input");
        var nameInput6 = "ref-pos[]";
        input6.setAttribute("type", "text");
        input6.id = nameInput6;
        input6.setAttribute("name", nameInput6);
        input6.setAttribute("class", "text-input-7");
        input6.setAttribute("placeholder", "Position");
        input6.setAttribute("autocomplete", "off");
        col6.appendChild(input6);

        rowCount++;
        document.getElementById("ref-count").value = rowCount;
        var rowChecker = document.getElementById("ref-row-count").value;
        rowChecker++;
        document.getElementById("ref-row-count").value = rowChecker;   
    } else if (section == "file") {
        var rowCount = document.getElementById("file-count").value;
        var tbl = document.getElementById("tbl-file");

        var row = tbl.insertRow(-1);
        row.id = "file-row-" + rowCount;

        var col1 = row.insertCell(0);
        var input1 = document.createElement("input");
        var nameInput1 = "file[]";
        input1.setAttribute("type", "file");
        input1.setAttribute("name", nameInput1);
        input1.setAttribute("class", "custom-file-input");
        input1.setAttribute("multiple", "");
        col1.appendChild(input1);

        var col2 = row.insertCell(1);
        var input2 = document.createElement("input");
        input2.setAttribute("type", "button");
        var deleteFunction = "deleteRow('file', '" + rowCount + "')";
        input2.setAttribute("onclick", deleteFunction);
        input2.setAttribute("value", "X");
        col2.appendChild(input2);
    }
}

function deleteRow(section, id) {
    if (section == "education") {
        var rowID = "education-row-" + id;
        var row = document.getElementById(rowID);
        row.parentNode.removeChild(row);
        var rowChecker = document.getElementById("education-row-count").value;
        rowChecker--;
        document.getElementById("education-row-count").value = rowChecker;
    } else if (section == "higher-ed") {
        var rowID = "higher-ed-row-" + id;
        var row = document.getElementById(rowID);
        row.parentNode.removeChild(row);
        var rowChecker = document.getElementById("higher-ed-row-count").value;
        rowChecker--;
        document.getElementById("higher-ed-row-count").value = rowChecker;
    } else if (section == "work-exp") {
        var rowID1 = "work-exp-row1-" + id;
        var rowID2 = "work-exp-row2-" + id;
        var row1 = document.getElementById(rowID1);
        var row2 = document.getElementById(rowID2);
        row1.parentNode.removeChild(row1);
        row2.parentNode.removeChild(row2);
        var rowChecker = document.getElementById("work-exp-row-count").value;
        rowChecker--;
        document.getElementById("work-exp-row-count").value = rowChecker;
    } else if (section == "ref") {
        var rowID1 = "ref-row1-" + id;
        var rowID2 = "ref-row2-" + id;
        var row1 = document.getElementById(rowID1);
        var row2 = document.getElementById(rowID2);
        row1.parentNode.removeChild(row1);
        row2.parentNode.removeChild(row2);
        var rowChecker = document.getElementById("ref-row-count").value;
        rowChecker--;
        document.getElementById("ref-row-count").value = rowChecker;
    } else if (section == "file") {
        var rowID = "file-row-" + id;
        var row = document.getElementById(rowID);
        row.parentNode.removeChild(row);
    }
}

function addRowsWithTitle(section) {
    if (section == "education") {
        var rowCount = document.getElementById("education-count").value;
        var tbl = document.getElementById("tbl-education");

        var titleRow = tbl.insertRow(-1);
        titleRow.id = "education-title-row-" + rowCount;

        var titleCol1 = titleRow.insertCell(0);
        titleCol1.innerHTML = "Education";
        titleCol1.setAttribute("class", "header-text title-col-1");

        var titleCol2 = titleRow.insertCell(1);
        titleCol2.innerHTML = "Institute";
        titleCol2.setAttribute("class", "header-text title-col-2");

        var titleCol3 = titleRow.insertCell(2);
        titleCol3.innerHTML = "From (Month/Year)";
        titleCol3.setAttribute("class", "header-text title-col-3");

        var titleCol4 = titleRow.insertCell(3);
        titleCol4.innerHTML = "To (Month/Year)";
        titleCol4.setAttribute("class", "header-text title-col-3");

        var row = tbl.insertRow(-1);
        row.id = "education-row-" + rowCount;
        row.setAttribute("class", "tbl-row");

        var col1 = row.insertCell(0);
        var input1 = document.createElement("select");
        var nameInput1 = "education[]";
        input1.id = nameInput1;
        input1.setAttribute("name", nameInput1);
        input1.setAttribute("class", "qualification-select-input-1");

        var defaultOption = document.createElement("option");
        defaultOption.value = "";
        defaultOption.text = "Education";
        defaultOption.selected = true;
        defaultOption.setAttribute('disabled', '');
        input1.appendChild(defaultOption);
        
        var array = ["Pentaksiran Tingkatan 3 (PT3)", "Sijil Peperiksaan Malaysia (SPM)", "Sijil Tinggi Peperiksaan Malaysia (STPM)"];        
        for (var i = 0; i < array.length; i++) {
            var option = document.createElement("option");
            option.value = array[i];
            option.text = array[i];
            input1.appendChild(option);
        }

        col1.appendChild(input1);

        var col2 = row.insertCell(1);
        var input2 = document.createElement("input");
        var nameInput2 = "education-institute[]";
        input2.setAttribute("type", "text");
        input2.id = nameInput2;
        input2.setAttribute("name", nameInput2);
        input2.setAttribute("class", "text-input-1");
        input2.setAttribute("placeholder", "Institute");
        input2.setAttribute("autocomplete", "off");
        col2.appendChild(input2);

        var col3 = row.insertCell(2);
        var input3 = document.createElement("input");
        var nameInput3 = "education-from[]";
        input3.setAttribute("type", "text");
        input3.id = nameInput3;
        input3.setAttribute("name", nameInput3);
        input3.setAttribute("class", "text-input-2");
        input3.setAttribute("placeholder", "From (Month/Year)");
        input3.setAttribute("autocomplete", "off");
        col3.appendChild(input3);

        var col4 = row.insertCell(3);
        var input4 = document.createElement("input");
        var nameInput4 = "education-to[]";
        input4.setAttribute("type", "text");
        input4.id = nameInput4;
        input4.setAttribute("name", nameInput4);
        input4.setAttribute("class", "text-input-2");
        input4.setAttribute("placeholder", "To (Month/Year)");
        input4.setAttribute("autocomplete", "off");
        col4.appendChild(input4);

        var col5 = row.insertCell(4);
        var input5 = document.createElement("input");
        input5.setAttribute("type", "button");
        input5.id = "tbl-education-del-" + rowCount;
        var deleteFunction = "deleteRowWithTitle('education', '" + rowCount + "')";
        input5.setAttribute("onclick", deleteFunction);
        input5.setAttribute("value", "X");
        col5.appendChild(input5);

        rowCount++;
        document.getElementById("education-count").value = rowCount;
        var rowChecker = document.getElementById("education-row-count").value;
        rowChecker++;
        document.getElementById("education-row-count").value = rowChecker;
    } else if (section == "higher-ed") {
        var rowCount = document.getElementById("higher-ed-count").value;
        var tbl = document.getElementById("tbl-higher-ed");

        var titleRow = tbl.insertRow(-1);
        titleRow.id = "higher-ed-title-row-" + rowCount;

        var titleCol1 = titleRow.insertCell(0);
        titleCol1.innerHTML = "Higher Education Level";
        titleCol1.setAttribute("class", "header-text title-col-3");

        var titleCol2 = titleRow.insertCell(1);
        titleCol2.innerHTML = "Institute";
        titleCol2.setAttribute("class", "header-text title-col-4");

        var titleCol3 = titleRow.insertCell(2);
        titleCol3.innerHTML = "Course";
        titleCol3.setAttribute("class", "header-text title-col-3");

        var titleCol4 = titleRow.insertCell(3);
        titleCol4.innerHTML = "Year (Month/Year)";
        titleCol4.setAttribute("class", "header-text title-col-3");

        var titleCol5 = titleRow.insertCell(4);
        titleCol5.innerHTML = "Results";
        titleCol5.setAttribute("class", "header-text title-col-4");

        var row = tbl.insertRow(-1);
        row.id = "higher-ed-row-" + rowCount;
        row.setAttribute("class", "tbl-row");

        var col1 = row.insertCell(0);
        var input1 = document.createElement("select");
        var nameInput1 = "higher-ed-lvl[]";
        input1.id = nameInput1;
        input1.setAttribute("name", nameInput1);
        input1.setAttribute("class", "qualification-select-input-2");

        var defaultOption = document.createElement("option");
        defaultOption.value = "";
        defaultOption.text = "Higher Education Level";
        defaultOption.selected = true;
        defaultOption.setAttribute('disabled', '');
        input1.appendChild(defaultOption);
        
        var array = ["Tertiary Education", "Certificate", "Diploma", "Advanced Diploma", "Degree", "Master", "Doctorate"];        
        for (var i = 0; i < array.length; i++) {
            var option = document.createElement("option");
            option.value = array[i];
            option.text = array[i];
            input1.appendChild(option);
        }

        col1.appendChild(input1);

        var col2 = row.insertCell(1);
        var input2 = document.createElement("input");
        var nameInput2 = "higher-ed-institute[]";
        input2.setAttribute("type", "text");
        input2.id = nameInput2;
        input2.setAttribute("name", nameInput2);
        input2.setAttribute("class", "text-input-3");
        input2.setAttribute("placeholder", "Institute");
        input2.setAttribute("autocomplete", "off");
        col2.appendChild(input2);

        var col3 = row.insertCell(2);
        var input3 = document.createElement("input");
        var nameInput3 = "higher-ed-course[]";
        input3.setAttribute("type", "text");
        input3.id = nameInput3;
        input3.setAttribute("name", nameInput3);
        input3.setAttribute("class", "text-input-2");
        input3.setAttribute("placeholder", "Course");
        input3.setAttribute("autocomplete", "off");
        col3.appendChild(input3);

        var col4 = row.insertCell(3);
        var input4 = document.createElement("input");
        var nameInput4 = "higher-ed-year[]";
        input4.setAttribute("type", "text");
        input4.id = nameInput4;
        input4.setAttribute("name", nameInput4);
        input4.setAttribute("class", "text-input-2");
        input4.setAttribute("placeholder", "Year (From - To)");
        input4.setAttribute("autocomplete", "off");
        col4.appendChild(input4);

        var col5 = row.insertCell(4);
        var input5 = document.createElement("input");
        var nameInput5 = "higher-ed-result[]";
        input5.setAttribute("type", "text");
        input5.id = nameInput5;
        input5.setAttribute("name", nameInput5);
        input5.setAttribute("class", "text-input-3");
        input5.setAttribute("placeholder", "Results");
        input5.setAttribute("autocomplete", "off");
        col5.appendChild(input5);

        var col6 = row.insertCell(5);
        var input6 = document.createElement("input");
        input6.setAttribute("type", "button");
        input6.id = "tbl-higher-ed-del-" + rowCount;
        var deleteFunction = "deleteRowWithTitle('higher-ed', '" + rowCount + "')";
        input6.setAttribute("onclick", deleteFunction);
        input6.setAttribute("value", "X");
        col6.appendChild(input6);

        rowCount++;
        document.getElementById("higher-ed-count").value = rowCount;
        var rowChecker = document.getElementById("higher-ed-row-count").value;
        rowChecker++;
        document.getElementById("higher-ed-row-count").value = rowChecker;
    } else if (section == "work-exp") {
        var rowCount = document.getElementById("work-exp-count").value;
        var tbl = document.getElementById("tbl-work-exp");

        var titleRow1 = tbl.insertRow(-1);
        titleRow1.id = "work-exp-title-row1-" + rowCount;

        var titleCol1 = titleRow1.insertCell(0);
        titleCol1.innerHTML = "Year (From/To)";
        titleCol1.setAttribute("class", "header-text");

        var titleCol2 = titleRow1.insertCell(1);
        titleCol2.innerHTML = "Company";
        titleCol2.setAttribute("class", "header-text");

        var titleCol3 = titleRow1.insertCell(2);
        titleCol3.innerHTML = "Position";
        titleCol3.setAttribute("class", "header-text");

        var titleCol4 = titleRow1.insertCell(3);
        titleCol4.innerHTML = "Salary (RM)";
        titleCol4.setAttribute("class", "header-text");

        var row1 = tbl.insertRow(-1);
        row1.id = "work-exp-row1-" + rowCount;
        row1.setAttribute("class", "tbl-row");

        var col1 = row1.insertCell(0);
        var input1 = document.createElement("input");
        var nameInput1 = "work-exp-year[]";
        input1.setAttribute("type", "text");
        input1.id = nameInput1;
        input1.setAttribute("name", nameInput2);
        input1.setAttribute("class", "text-input-5");
        input1.setAttribute("placeholder", "Year (From/To)");
        input1.setAttribute("autocomplete", "off");
        col1.appendChild(input1);

        var col2 = row1.insertCell(1);
        var input2 = document.createElement("input");
        var nameInput2 = "work-exp-company[]";
        input2.setAttribute("type", "text");
        input2.id = nameInput2;
        input2.setAttribute("name", nameInput2);
        input2.setAttribute("class", "text-input-5");
        input2.setAttribute("placeholder", "Company");
        input2.setAttribute("autocomplete", "off");
        col2.appendChild(input2);

        var col3 = row1.insertCell(2);
        var input3 = document.createElement("input");
        var nameInput3 = "work-exp-position[]";
        input3.setAttribute("type", "text");
        input3.id = nameInput3;
        input3.setAttribute("name", nameInput3);
        input3.setAttribute("class", "text-input-5");
        input3.setAttribute("placeholder", "Position");
        input3.setAttribute("autocomplete", "off");
        col3.appendChild(input3);

        var col4 = row1.insertCell(3);
        var input4 = document.createElement("input");
        var nameInput4 = "work-exp-salary[]";
        input4.setAttribute("type", "text");
        input4.id = nameInput4;
        input4.setAttribute("name", nameInput4);
        input4.setAttribute("class", "text-input-5");
        input4.setAttribute("placeholder", "Salary (RM)");
        input4.setAttribute("autocomplete", "off");
        col4.appendChild(input4);

        var col5 = row1.insertCell(4);
        col5.setAttribute("rowspan", "2");
        var input5 = document.createElement("input");
        input5.setAttribute("type", "button");
        input5.id = "tbl-work-exp-del-" + rowCount;
        var deleteFunction = "deleteRowWithTitle('work-exp', '" + rowCount + "')";
        input5.setAttribute("onclick", deleteFunction);
        input5.setAttribute("value", "X");
        col5.appendChild(input5);

        var titleRow2 = tbl.insertRow(-1);
        titleRow2.id = "work-exp-title-row2-" + rowCount;

        var titleCol5 = titleRow2.insertCell(0);
        titleCol5.innerHTML = "Job Description";
        titleCol5.setAttribute("class", "header-text");
        titleCol5.setAttribute("colspan", "2");

        var titleCol6 = titleRow2.insertCell(1);
        titleCol6.innerHTML = "Reason of Leaving";
        titleCol6.setAttribute("class", "header-text");
        titleCol6.setAttribute("colspan", "2");

        var row2 = tbl.insertRow(-1);
        row2.id = "work-exp-row2-" + rowCount;
        row2.setAttribute("class", "tbl-row");

        var col6 = row2.insertCell(0);
        col6.setAttribute("colspan", "2");
        var input6 = document.createElement("textarea");
        var nameInput6 = "work-exp-job-desc[]";
        input6.setAttribute("type", "text");
        input6.id = nameInput6;
        input6.setAttribute("name", nameInput6);
        input6.setAttribute("class", "text-input-4");
        input6.setAttribute("placeholder", "Job Description");
        input6.setAttribute("autocomplete", "off");
        col6.appendChild(input6);

        var col7 = row2.insertCell(1);
        col7.setAttribute("colspan", "2");
        var input7 = document.createElement("textarea");
        var nameInput7 = "work-exp-reason[]";
        input7.setAttribute("type", "text");
        input7.id = nameInput7;
        input7.setAttribute("name", nameInput7);
        input7.setAttribute("class", "text-input-4");
        input7.setAttribute("placeholder", "Reason of Leaving");
        input7.setAttribute("autocomplete", "off");
        col7.appendChild(input7);

        rowCount++;
        document.getElementById("work-exp-count").value = rowCount;
        var rowChecker = document.getElementById("work-exp-row-count").value;
        rowChecker++;
        document.getElementById("work-exp-row-count").value = rowChecker;
    } else if (section == "ref") {
        var rowCount = document.getElementById("ref-count").value;
        var tbl = document.getElementById("tbl-ref");

        var titleRow1 = tbl.insertRow(-1);
        titleRow1.id = "ref-title-row1-" + rowCount;

        var titleCol1 = titleRow1.insertCell(0);
        titleCol1.innerHTML = "Name";
        titleCol1.setAttribute("class", "header-text");
        titleCol1.setAttribute("colspan", "2");

        var titleCol2 = titleRow1.insertCell(1);
        titleCol2.innerHTML = "Relationship";
        titleCol2.setAttribute("class", "header-text");
        titleCol2.setAttribute("colspan", "2");

        var titleCol3 = titleRow1.insertCell(2);
        titleCol3.innerHTML = "Phone No.";
        titleCol3.setAttribute("class", "header-text");
        titleCol3.setAttribute("colspan", "2");

        var row1 = tbl.insertRow(-1);
        row1.id = "ref-row1-" + rowCount;
        row1.setAttribute("class", "tbl-row");

        var col1 = row1.insertCell(0);
        col1.setAttribute("colspan", "2");
        var input1 = document.createElement("input");
        var nameInput1 = "ref-name[]";
        input1.setAttribute("type", "text");
        input1.id = nameInput1;
        input1.setAttribute("name", nameInput2);
        input1.setAttribute("class", "text-input-6");
        input1.setAttribute("placeholder", "Name");
        input1.setAttribute("autocomplete", "off");
        col1.appendChild(input1);

        var col2 = row1.insertCell(1);
        col2.setAttribute("colspan", "2");
        var input2 = document.createElement("input");
        var nameInput2 = "ref-relationship[]";
        input2.setAttribute("type", "text");
        input2.id = nameInput2;
        input2.setAttribute("name", nameInput2);
        input2.setAttribute("class", "text-input-6");
        input2.setAttribute("placeholder", "Relationship");
        input2.setAttribute("autocomplete", "off");
        col2.appendChild(input2);

        var col3 = row1.insertCell(2);
        col3.setAttribute("colspan", "2");
        var input3 = document.createElement("input");
        var nameInput3 = "ref-phone[]";
        input3.setAttribute("type", "text");
        input3.id = nameInput3;
        input3.setAttribute("name", nameInput3);
        input3.setAttribute("class", "text-input-6");
        input3.setAttribute("placeholder", "Phone No.");
        input3.setAttribute("autocomplete", "off");
        col3.appendChild(input3);

        var col4 = row1.insertCell(3);
        col4.setAttribute("rowspan", "2");
        var input4 = document.createElement("input");
        input4.setAttribute("type", "button");
        input4.id = "tbl-ref-del-" + rowCount;
        var deleteFunction = "deleteRowWithTitle('ref', '" + rowCount + "')";
        input4.setAttribute("onclick", deleteFunction);
        input4.setAttribute("value", "X");
        col4.appendChild(input4);

        var titleRow2 = tbl.insertRow(-1);
        titleRow2.id = "ref-title-row2-" + rowCount;

        var titleCol4 = titleRow2.insertCell(0);
        titleCol4.innerHTML = "College/University/Company";
        titleCol4.setAttribute("class", "header-text");
        titleCol4.setAttribute("colspan", "3");

        var titleCol5 = titleRow2.insertCell(1);
        titleCol5.innerHTML = "Position";
        titleCol5.setAttribute("class", "header-text");
        titleCol5.setAttribute("colspan", "3");

        var row2 = tbl.insertRow(-1);
        row2.id = "ref-row2-" + rowCount;
        row2.setAttribute("class", "tbl-row");

        var col5 = row2.insertCell(0);
        col5.setAttribute("colspan", "3");
        var input5 = document.createElement("input");
        var nameInput5 = "ref-place[]";
        input5.setAttribute("type", "text");
        input5.id = nameInput5;
        input5.setAttribute("name", nameInput5);
        input5.setAttribute("class", "text-input-7");
        input5.setAttribute("placeholder", "College/University/Company");
        input5.setAttribute("autocomplete", "off");
        col5.appendChild(input5);

        var col6 = row2.insertCell(1);
        col6.setAttribute("colspan", "3");
        var input6 = document.createElement("input");
        var nameInput6 = "ref-pos[]";
        input6.setAttribute("type", "text");
        input6.id = nameInput6;
        input6.setAttribute("name", nameInput6);
        input6.setAttribute("class", "text-input-7");
        input6.setAttribute("placeholder", "Position");
        input6.setAttribute("autocomplete", "off");
        col6.appendChild(input6);

        rowCount++;
        document.getElementById("ref-count").value = rowCount;
        var rowChecker = document.getElementById("ref-row-count").value;
        rowChecker++;
        document.getElementById("ref-row-count").value = rowChecker;   
    }
}

function deleteRowWithTitle(section, id) {
    if (section == "education") {
        var rowID = "education-row-" + id;
        var row = document.getElementById(rowID);
        row.parentNode.removeChild(row);
        var titleRowID = "education-title-row-" + id;
        var titleRow = document.getElementById(titleRowID);
        titleRow.parentNode.removeChild(titleRow);
        var rowChecker = document.getElementById("education-row-count").value;
        rowChecker--;
        document.getElementById("education-row-count").value = rowChecker;
    } else if (section == "higher-ed") {
        var rowID = "higher-ed-row-" + id;
        var row = document.getElementById(rowID);
        row.parentNode.removeChild(row);
        var titleRowID = "higher-ed-title-row-" + id;
        var titleRow = document.getElementById(titleRowID);
        titleRow.parentNode.removeChild(titleRow);
        var rowChecker = document.getElementById("higher-ed-row-count").value;
        rowChecker--;
        document.getElementById("higher-ed-row-count").value = rowChecker;
    } else if (section == "work-exp") {
        var rowID1 = "work-exp-row1-" + id;
        var rowID2 = "work-exp-row2-" + id;
        var row1 = document.getElementById(rowID1);
        var row2 = document.getElementById(rowID2);
        row1.parentNode.removeChild(row1);
        row2.parentNode.removeChild(row2);
        var titleRowID1 = "work-exp-title-row1-" + id;
        var titleRowID2 = "work-exp-title-row2-" + id;
        var titleRow1 = document.getElementById(titleRowID1);
        var titleRow2 = document.getElementById(titleRowID2);
        titleRow1.parentNode.removeChild(titleRow1);
        titleRow2.parentNode.removeChild(titleRow2);
        var rowChecker = document.getElementById("work-exp-row-count").value;
        rowChecker--;
        document.getElementById("work-exp-row-count").value = rowChecker;
    } else if (section == "ref") {
        var rowID1 = "ref-row1-" + id;
        var rowID2 = "ref-row2-" + id;
        var row1 = document.getElementById(rowID1);
        var row2 = document.getElementById(rowID2);
        row1.parentNode.removeChild(row1);
        row2.parentNode.removeChild(row2);
        var titleRowID1 = "ref-title-row1-" + id;
        var titleRowID2 = "ref-title-row2-" + id;
        var titleRow1 = document.getElementById(titleRowID1);
        var titleRow2 = document.getElementById(titleRowID2);
        titleRow1.parentNode.removeChild(titleRow1);
        titleRow2.parentNode.removeChild(titleRow2);
        var rowChecker = document.getElementById("ref-row-count").value;
        rowChecker--;
        document.getElementById("ref-row-count").value = rowChecker;
    }
}