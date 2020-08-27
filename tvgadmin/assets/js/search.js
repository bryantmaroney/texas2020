$(document).ready(function($) {
	
	// $(document).on('click', '.inputSearchSlideDown', function(event) {
	// 	$('.chooseSearchType').slideToggle(300);
	// });

	$(document).on('click', '.inputSearchSlideDown', function(event) {

		// $('.search input').attr('placeholder',`Select parameters for the search`);
		if ($('.search input').attr('search') == 'candidates') {
		
			var keys =["first_name", "last_name", "seeking_office", "which_district", "email", "created_at"];

			$(".chooseSearchType").empty();
			keys.forEach(function(item){
				var title = item.split('_').join(' ').toUpperCase();
				$(".chooseSearchType").append(`
					<div field="${item}">${title}</div>
				`)
			})
		
		}
		else {
			var keys = ["voterIP", "email", "city", "state"];

			$(".chooseSearchType").empty();
			keys.forEach(function(item){
				var title = item.split('_').join(' ').toUpperCase();
				$(".chooseSearchType").append(`
					<div field="${item}">${title}</div>
				`)
			})
		}

		$('.chooseSearchType').slideToggle(300);
	});

	$(document).on('click', '.chooseSearchType > div', function(event) {
		$('.search input').attr('field', $(this).attr('field'));
		$('.search input').removeAttr('readonly');
		$('.chooseSearchType').slideToggle(300);
	});

	$(document).on('click', '#clearIcon', function(event) {
		$('.search input').val('');
		$("#clearIcon").after('<i id="searchIcone" class="fas fa-search searchIcon"></i>');
		$("#clearIcon").remove();
		if ($('.search input').attr('search') == 'candidates') {
			filtreCandidates(submitted_candidates);
		}
		else {
			filterVoters(voters);
		}

	});

	$(document).on('input', '.search input', function(event) {

		if($(this).val() !="") {
			$("#searchIcone").after('<i id="clearIcon" class="fas fa-times searchIcon"></i>');
			$("#searchIcone").remove();
		}
		else {
			$("#clearIcon").after('<i id="searchIcone" class="fas fa-search searchIcon"></i>');
			$("#clearIcon").remove()
		}

		var searchType = $(this).attr('search');
		var searchField = $(this).attr('field');
		var searchText = $(this).val();


		if (searchType == 'candidates') {
			var filteredCandidates = submitted_candidates.filter(function(candidate){
				return candidate[searchField].toLowerCase().startsWith(searchText.toLowerCase())
			})
			filtreCandidates(filteredCandidates);
		}
		else {
			var filteredVoters = voters.filter(function(voter){
				return voter[searchField].toLowerCase().startsWith(searchText.toLowerCase())
			})
			filterVoters(filteredVoters);
		} 
	});

	function filtreCandidates(filteredCandidates){

 		$('#dataTable').DataTable().clear().draw();


 		filteredCandidates.forEach(function(candidate,index){

 			if (candidate.local_profile_photo != null) {
 				var td1 = `<td class='imageField'>
							  <img class='tableUserImage' src="${candidate.local_profile_photo}" alt="">
							  <span>${candidate.first_name} ${candidate.last_name}</span>
						   </td>`;
 			}
 			else {
 				var td1 = `<td class='imageField'>
							  <img class='tableUserImage' src="${site_url}assets/images/candidate_dummy.png" alt="">
							  <span>${candidate.first_name} ${candidate.last_name}</span>
						   </td>`;
 			}

 			if (candidate.seeking_office == "U.S. Senate") {
 				var td2 = `<td class="padNotFirst">${candidate.seeking_office}<span></span></td>`
 			}
 			else {
 				var td2 = `<td class="padNotFirst"><span>${candidate.seeking_office} - ${candidate.which_district}</span></td>`
 			}

 			var td3 = $('<td class="answersPart padNotFirst"></td>');
 			var election_reform = JSON.parse(candidate.election_reform);
 			var index3 = 1;

 			for(let key in election_reform) {
 				if (election_reform[key] == 'agree') {
 					td3.append(`<span>${index3++}.<img src="${site_url}assets/images/right-mark.png" width="15" height="15" alt="img"> </span>`)
 				}
 				else {
 					td3.append(` <span>${index3++}.<img src="${site_url}assets/images/close-red.png" width="15" height="15" alt="img"> </span>`)
 				}
 			}
 			td3.addClass('answersPart padNotFirst')
 			var td3 = "<td class='answersPart padNotFirst'>"+td3.html()+"</td>";


 			var td4 = $('<td class="answersPart padNotFirst"></td>');
 			var money_in_politics = JSON.parse(candidate.money_in_politics);
 			var index3 = 1;

 			for(let key in money_in_politics) {
 				if (money_in_politics[key] == 'agree') {
 					td4.append(`<span>${index3++}.<img src="${site_url}assets/images/right-mark.png" width="15" height="15" alt="img"> </span>`)
 				}
 				else {
 					td4.append(` <span>${index3++}.<img src="${site_url}assets/images/close-red.png" width="15" height="15" alt="img"> </span>`)
 				}
 			}
 			td4.addClass('answersPart padNotFirst')
 			var td4 = "<td class='answersPart padNotFirst'>"+td4.html()+"</td>";

 			if (candidate.active == "1") {
 				var td5 = `<td class="isVerified padNotFirst"><button class="verified">Verified</button></td>`
 			}
 			else {
 				var td5 = `<td class="isVerified padNotFirst"><button class="notVerified">Not Verified</button></td>`
 			}

 			var td6 = `
						<td class="edDelSection padNotFirst" candidateID="${candidate.id}">
						    <span class="editSubmettedCandidatePhoto">
						        <label for="upload${index}">
						            <img src="${site_url}assets/images/edit.png" title="edit candidate" alt="">
						        </label>
						        <input style="display: none" type="file" name="upload" id="upload${index}" class="upload-box changeSubmPhotoInp" placeholder="Upload File" />
						    </span>
						    <span class="deleteSubmittedCandidate"><img src="${site_url}assets/images/delete.png" title="delete candidate" alt=""></span>
						</td>`



			var table = `<tr candidateID="${candidate.id}">`+td1+td2+td3+td4+td5+td6+`</tr>`;


			$('#dataTable').DataTable().rows.add($(table)).draw();

 		})
	}

	function filterVoters(filteredVoters){
		$('#votersDataTable').DataTable().clear().draw();

		filteredVoters.forEach(function(voter,index){

			var td1 = `<td>${voter.voterIP}</td>`;
			var td2 = `<td>${voter.city},${voter.state}</td>`;
			var td3 = `<td>${voter.email}</td>`;

			if (voter.survey_complete) {
				var td4 = `<td><span class="yes">Yes</span></td>`;
			}
			else {
				var td4 = `<td><span class="no">No</span></td>`;
			}

			if (voter.shared) {
				var td5 = `<td><span class="yes">Yes</span></td>`;
			}
			else {
				var td5 = `<td><span class="no">No</span></td>`;
			}

			var td6 = `<td class="shareIcons">
						    <div>
						        <img src="${site_url}assets/images/fb.png" width="38" height="38" alt="img">
						        <img src="${site_url}assets/images/tw.png" width="38" height="38" alt="img">
						        <img src="${site_url}assets/images/in.png" width="38" height="38" alt="img">
						        <img src="${site_url}assets/images/lin.png" width="38" height="38" alt="img">
						    </div>
						</td>`;

			var table = `<tr class="voterColumn" voterID="${voter.id}">`+td1+td2+td3+td4+td5+td6+`</tr>`;

			$('#votersDataTable').DataTable().rows.add($(table)).draw();

		})


	}
});
